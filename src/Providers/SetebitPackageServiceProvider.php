<?php

namespace Setebit\Package\Providers;

use Illuminate\Support\ServiceProvider;
use Setebit\Package\Console\PrizedrawsConsume;
use Setebit\Package\Http\Middleware\BindTheHeader;
use Setebit\Package\Services\RabbitMQConnection;

class SetebitPackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app('router')->aliasMiddleware('auth-data', BindTheHeader::class);

        $this->publishes([
            __DIR__ . '/../config/setebit-package.php' => config_path('setebit-package.php'),
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/setebit-package.php', 'setebit-package');

        if ($this->app->runningInConsole()) {
            $this->commands([PrizedrawsConsume::class]);
        }

        $this->app->bind('rabbitmq', function ($app) {
            return new RabbitMQConnection();
        });
    }
}
