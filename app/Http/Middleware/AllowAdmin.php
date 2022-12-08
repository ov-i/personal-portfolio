<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AllowAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Closure|RedirectResponse|JsonResponse|Response
     */
    public function handle(Request $request, Closure $next): Closure|RedirectResponse|JsonResponse|Response
    {
        if (! (new AuthController())->isAdmin()) {
            return redirect()->back();
        }

        return $next($request);
    }
}
