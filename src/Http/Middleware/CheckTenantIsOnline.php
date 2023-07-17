<?php

namespace Setebit\Package\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTenantIsOnline
{
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = auth()->check()
            ? auth()->user()->tenant
            : discoverTenant();

        if (!$tenant || !$tenant->setting->active_online) {
            return response()
                ->json(['message' => 'Banca não possui módulo online ativado.'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
