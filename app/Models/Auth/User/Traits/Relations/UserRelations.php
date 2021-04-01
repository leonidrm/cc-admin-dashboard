<?php declare(strict_types=1);

namespace App\Models\Auth\User\Traits\Relations;

use App\Models\Auth\Role\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait UserRelations
{
    /**
     * Relation with role
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }
}
