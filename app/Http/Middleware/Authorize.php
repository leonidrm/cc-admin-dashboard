<?php declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Authorize
{
    use AuthorizesRequests;

    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $ability, $attributes = [])
    {
        $this->authorize($ability, $attributes);

        return $next($request);
    }
}
