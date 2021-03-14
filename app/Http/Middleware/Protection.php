<?php declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use NetLicensing\Constants;
use NetLicensing\NetLicensingService;
use NetLicensing\RestException;

class Protection
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param $productModuleNumber
     * @param null $failedRouteName
     * @return RedirectResponse|Redirector
     */
    public function handle($request, Closure $next, $productModuleNumber, $failedRouteName)
    {
        //check if user authenticate
        if (!Auth::guard()->check()) {
            return redirect()->route('login');
        }

        try {
            if (!auth()->user()->hasAccess($productModuleNumber)) {
                return redirect()->route($failedRouteName, [
                    'dest' => url()->current(),
                    'product_module_number' => $productModuleNumber,
                ]);
            }
        } catch (Exception $e) {
            if ($e instanceof RestException) {

                $authError = false;
                $wiki = 'Check out troubleshooting page at https://github.com/Labs64/laravel-boilerplate/wiki/NetLicensing-Connection-Error';

                if (NetLicensingService::getInstance()->lastCurlInfo()->httpStatusCode == 401) {
                    $authError = true;
                }

                switch (env('NETLICENSING_SECURITY_MODE')) {
                    case Constants::BASIC_AUTHENTICATION:
                        if (empty(env('NETLICENSING_USERNAME')) || empty('NETLICENSING_PASSWORD')) {
                            $authError = true;
                        }
                        break;
                    case Constants::APIKEY_IDENTIFICATION:
                        if (empty(env('NETLICENSING_APIKEY'))) {
                            $authError = true;
                        }
                        break;
                }

                if ($authError) throw new RestException($e->getMessage() . '; ' . $wiki);;
            }
        }

        return $next($request);
    }
}
