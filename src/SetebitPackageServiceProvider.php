<?php

namespace Setebit\Package;

use Illuminate\Support\ServiceProvider;
use Setebit\Package\Console\PrizedrawsConsume;
use Setebit\Package\Http\Middleware\BindTheHeader;

class SetebitPackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app('router')->aliasMiddleware('auth-data', BindTheHeader::class);

        $this->publishes([
            __DIR__ . '/../config/setebit-package.php' => config_path('setebit-package.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/setebit-package.php', 'setebit-package');

        if ($this->app->runningInConsole()) {
            $this->commands([PrizedrawsConsume::class]);
        }
    }
}
