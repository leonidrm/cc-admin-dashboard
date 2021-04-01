<?php declare(strict_types=1);

namespace App\Http\Controllers\Membership;

use App\Models\Auth\User\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'failed', 'clearValidationCache']]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        $membership = collect([
            'valid' => true,
            'shopUrl' => null,
            'expires' => null,

        ]);

        if ($user->protectionValidation) {
            $validationResult = collect($user->protectionValidation->getValidationResult(config('protection.membership.product_module_number')));

            $membership->put('expires', $validationResult->get('expires'));

            $successUrl = route('protection.membership.clear_validation_cache', ['dest' => url()->current()]);
            $cancelUrl = url()->current();

            $protectionShopToken = protection_shop_token($user, $successUrl, $cancelUrl);

            $membership->put('shopUrl', $protectionShopToken->shop_url);
        }

        return view('membership')->with($membership->toArray());
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function failed(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        $membership = collect([
            'valid' => false,
            'shopUrl' => null,
            'expires' => null,

        ]);

        if (!$user->protectionValidation) return redirect($request->get('dest', '/'));

        $validationResult = collect($user->protectionValidation->getValidationResult(config('protection.membership.product_module_number')));

        $membership->put('expires', $validationResult->get('expires'));

        $successUrl = route('protection.membership.clear_validation_cache', ['dest' => $request->get('dest', url('/'))]);
        $cancelUrl = url('/');

        $protectionShopToken = protection_shop_token($user, $successUrl, $cancelUrl);

        $membership->put('shopUrl', $protectionShopToken->shop_url);

        return view('membership')->with($membership->toArray());
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function clearValidationCache(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();
        $user->load(['protectionValidation']);

        if ($user->protectionValidation) $user->protectionValidation->delete();

        return redirect($request->get('dest', '/'));
    }
}
