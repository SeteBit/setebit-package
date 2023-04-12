<?php

namespace Setebit;

use Illuminate\Support\ServiceProvider;

class SetebitPackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/setebit-package.php' => config_path('setebit-package.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/setebit-package.php', 'setebit-package');
    }
}
