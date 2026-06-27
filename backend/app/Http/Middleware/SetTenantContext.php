<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetTenantContext
{
    /**
     * Handle an incoming request.
     *
     * Extract organization_id from the authenticated user and bind it to the application
     * so the TenantScope can apply it to all queries.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->organization_id) {
            app()->instance('organization_id', $request->user()->organization_id);
        }

        return $next($request);
    }
}
