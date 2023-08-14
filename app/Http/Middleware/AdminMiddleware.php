<?php

namespace App\Http\Middleware;

use App\Contracts\Services\RolesServiceContract;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function __construct(private readonly RolesServiceContract $rolesService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !
            $this->rolesService->userIsAdmin($request->user()->id)) {
            return abort(403);
        }
        return $next($request);
    }
}
