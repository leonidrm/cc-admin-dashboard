<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if(Auth::guest()) {
            return view('welcome');
        }

        $user = Auth::user();

        if($user->hasRole('client')) {
            return redirect('/member');
        }

        return redirect('/admin');
    }
}
