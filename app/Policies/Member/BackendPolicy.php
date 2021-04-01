<?php declare(strict_types=1);

namespace App\Policies\Member;

use App\Models\Auth\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BackendPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability): ?bool
    {
        if ($user->hasRole('client')) return true;
        if (!$user->active) return false;

        return null;
    }

    /**
     * User has access to dashboard
     *
     * @param User $user
     * @return bool|int
     */
    public function view(User $user)
    {
        /**
         * Add roles, who can view dashboard
         */
        return $user->hasRole('client');
    }
}
