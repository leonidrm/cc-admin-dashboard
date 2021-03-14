<?php declare(strict_types=1);

/**
 * Global helpers file with misc functions.
 */

use App\Models\Auth\User\User;
use App\Models\Protection\ProtectionShopToken;
use App\Models\Protection\ProtectionValidation;
use Creativeorange\Gravatar\Gravatar;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use NetLicensing\Constants;
use NetLicensing\Context;
use Illuminate\Support\Facades\Auth;

if (!function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     *
     * @return Gravatar|Application|mixed
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (!function_exists('to_js')) {
    /**
     * Access the javascript helper.
     */
    function to_js($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('tojs');
        }

        if (is_array($key)) {
            return app('tojs')->put($key);
        }

        return app('tojs')->get($key, $default);
    }
}

if (!function_exists('meta')) {
    /**
     * Access the meta helper.
     */
    function meta()
    {
        return app('meta');
    }
}

if (!function_exists('meta_tag')) {
    /**
     * Access the meta tags helper.
     */
    function meta_tag($name = null, $content = null, $attributes = [])
    {
        return app('meta')->tag($name, $content, $attributes);
    }
}

if (!function_exists('meta_property')) {
    /**
     * Access the meta tags helper.
     */
    function meta_property($name = null, $content = null, $attributes = [])
    {
        return app('meta')->property($name, $content, $attributes);
    }
}

if (!function_exists('protection_context')) {
    /**
     * @return Context
     */
    function protection_context()
    {
        return app('netlicensing')->context();
    }
}

if (!function_exists('protection_context_basic_auth')) {
    /**
     * @return Context
     */
    function protection_context_basic_auth()
    {
        return app('netlicensing')->context(Constants::BASIC_AUTHENTICATION);
    }
}

if (!function_exists('protection_context_api_key')) {
    /**
     * @return Context
     */
    function protection_context_api_key()
    {
        return app('netlicensing')->context(Constants::APIKEY_IDENTIFICATION);
    }
}

if (!function_exists('protection_shop_token')) {

    function protection_shop_token(
        User $user,
        ?string $successUrl = null,
        ?string $cancelUrl = null,
        ?string $successUrlTitle = null,
        ?string $cancelUrlTitle = null
    ): ProtectionShopToken {
        return app('netlicensing')->createShopToken($user, $successUrl, $cancelUrl, $successUrlTitle, $cancelUrlTitle);
    }
}

if (!function_exists('protection_validate')) {

    /**
     * @param User $user
     * @return ProtectionValidation
     */
    function protection_validate(User $user): ProtectionValidation
    {
        return app('netlicensing')->validate($user);
    }
}

if (!function_exists('__trans_choice')) {
    /**
     * Translates the given message based on a count from json key.
     *
     * @param $key
     * @param $number
     * @param array $replace
     * @param null $locale
     * @return string
     */
    function __trans_choice($key, $number, array $replace = [], $locale = null): string
    {
        return trans_choice(__($key), $number, $replace, $locale);
    }
}

if(!function_exists('isAdmin'))
{
    /**
     * Is Admin
     *
     * @return bool
     */
    function isAdmin(string $default = '/'): bool
    {
        $user = Auth::user();

        return $user->hasRole('administrator');
    }
}

if(!function_exists('redirectToDashboad'))
{
    /**
     * Redirect To Dashboard
     *
     * @param string $default
     * @return RedirectResponse|Redirector
     */
    function redirectToDashboad(string $default = '/')
    {
        if(isAdmin())
        {
            return redirect('/admin');
        }

        return redirect($default);
    }
}
