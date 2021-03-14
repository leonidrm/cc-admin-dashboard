<?php declare(strict_types=1);

namespace App\Models\Auth\User\Traits\Attributes;

trait UserAttributes
{

    /**
     * Get user avatar by gravatar
     *
     * @param string|null $size
     * @return string
     */
    public function getGravatar(?string $size = null): string
    {
        $size = $size !== null ? $size : config('gravatar.default.size');

        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * Get User licensee number
     */
    public function getLicenseeNumberAttribute()
    {
        return $this->getAttribute(config('protection.defaults.licensee.number'));
    }

    /**
     * Get User licensee name
     *
     * @return mixed
     */
    public function getLicenseeNameAttribute()
    {
        return $this->getAttribute(config('protection.defaults.licensee.name'));
    }
}
