<?php

namespace App\Models\Auth\User\Traits\Ables;

use App\Models\Auth\Role\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait Rolable
{
    /**
     * Checks if the user has a role.
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if ($role instanceof Model) $role = $role->getKey();

        if ($this->roles->isEmpty()) return false;

        return ($this->roles->contains('id', null, $role) || $this->roles->contains('name', null, $role));
    }

    /**
     * Checks if the user has a roles.
     *
     * @param $roles
     * @param bool $all
     * @return bool|int
     */
    public function hasRoles($roles, $all = false): bool
    {
        if ($roles instanceof Model) $roles = $roles->getKey();

        if ($roles instanceof Collection) $roles = $roles->modelKeys();

        $roles = is_array($roles) === false ? [$roles] : $roles;

        $hasRoles = 0;

        foreach ($roles as $role) {
            if ($this->hasRole($role)) $hasRoles++;
        }

        return $all ? $hasRoles === count($roles): $hasRoles > 0;
    }

    public function hasOneRole(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }
}
