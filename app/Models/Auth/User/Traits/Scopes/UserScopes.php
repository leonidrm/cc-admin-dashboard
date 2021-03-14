<?php declare(strict_types=1);

namespace App\Models\Auth\User\Traits\Scopes;

use App\Models\Auth\Role\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait UserScopes
{
    /**
     * Fetch users by a given role id or role name value.
     * @param Builder $query
     * @param Role $role
     * @return Builder
     */
    public function scopeWhereRole(Builder $query, Role $role): Builder
    {
        if ($role instanceof Model) $role = $role->getKey();

        $query->whereHas('roles', function ($query) use ($role) {
            /** @var $query \Illuminate\Database\Query\Builder */
            $query->orWhere('id', $role)->orWhere('name', $role);
        });

        return $query;
    }
}
