<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $users = User::with(['roles', 'protectionValidation'])->sortable(['email' => 'asc'])->paginate();
        return view('admin.permissions', ['users' => $users]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return Application|ResponseFactory|RedirectResponse|Response
     */
    public function repeat(User $user, Request $request)
    {
        $protectionValidation = protection_validate($user);

        if ($request->expectsJson()) return response($protectionValidation->toArray());

        return redirect()->back();
    }
}
