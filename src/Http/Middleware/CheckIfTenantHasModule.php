<?php

namespace Setebit\Package\Http\Middleware;

use Illuminate\Http\Request;
use Setebit\Package\Traits\ApiResponse;
use Symfony\Component\HttpFoundation\Response;

class CheckIfTenantHasModule
{
    use ApiResponse;

    public function handle(Request $request, \Closure $next, string $role)
    {
        $modules = tenant()->modules->pluck('name')->toArray();

        if ($role === "tradicional") {
            // tradicional || lototime
            $role = $request->route('module');


            if (is_null($role)) {
                if (in_array('tradicional', $modules)) {
                    $role = 'tradicional';
                } elseif (in_array('lototime', $modules)) {
                    $role = 'lototime';
                }
            }
        }

        $module = match ($role) {
            'tradicional' => 'tradicional',
            'lototime' => 'lototime',
            'seninha' => 'seninha',
            'sena-brasil' => 'sena brasil',
            'bolao-dezena' => 'bolão de dezenas',
            'bolao' => 'bolão',
            'rifa' => 'rifa',
            'dois-quinhentos' => '2 pra 500',
            default => null
        };

        if (!in_array($module, $modules)) {
            if (is_null($module)) {
                $module = "tradicional e lototime";
            }

            return $this->error(ucfirst($module) . " não está liberado para sua banca!", Response::HTTP_LOCKED);
        }

        return $next($request);
    }
}
