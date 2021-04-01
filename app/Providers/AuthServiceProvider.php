<?php declare(strict_types=1);

namespace App\Providers;

use App\Models\Auth\User\User;
use App\Policies\Backend\BackendPolicy;
use App\Policies\Member\BackendPolicy as MemberPolicy;
use App\Policies\Models\User\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        /**
         * Models Policies
         */
        User::class => UserPolicy::class,
        /**
         * Without models policies
         */
        'backend' => BackendPolicy::class,
        'member'  => MemberPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
