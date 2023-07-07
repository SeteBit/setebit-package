<?php

namespace Setebit\Package\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Setebit\Package\AuthData;

class BindTheHeader
{
    public function handle(Request $request, Closure $next)
    {
        $headers = collect();

        collect($request->headers)
            ->only(config('setebit-package.allowed_headers'))
            ->each(function ($headerValue, $headerName) use ($headers) {
                $headerName = Str::of($headerName)->replace('x-', '')->replace('-', '_')->camel();

                $headers->put($headerName->value(), json_decode($headerValue[0]));
            });

        App::scoped(AuthData::class, function () use ($headers, $request) {
            return new AuthData($headers->toArray(), $request);
        });

        return $next($request);
    }
}
