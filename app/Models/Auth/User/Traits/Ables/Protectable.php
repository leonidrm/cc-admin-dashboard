<?php declare(strict_types=1);

namespace App\Models\Auth\User\Traits\Ables;

trait Protectable
{
    /**
     * @param $productModuleNumber
     * @return bool
     */
    public function hasAccess($productModuleNumber): bool
    {
        //skip if user has except roles
        $exceptRoles = config('protection.except_roles');
        if ($exceptRoles && $this->hasRoles($exceptRoles)) return true;

        return app('netlicensing')->validate($this)->isValid($productModuleNumber);
    }
}
