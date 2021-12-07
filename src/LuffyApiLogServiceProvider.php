<?php

namespace Luffy\ApiLog;

use Illuminate\Contracts\Http\Kernel;
use Luffy\ApiLog\Http\Middleware\ApiLog;

class LuffyApiLogServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->registerMigrations();

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'api-log-migrations');

            $this->publishes([
                __DIR__ . '/../config/api-log.php' => config_path('api-log.php'),
            ], 'api-log-config');
        }

        $this->bootMiddlewares();
    }

    /**
     * @return mixed
     */
    protected function registerMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    private function bootMiddlewares()
    {
        $this->app['router']->pushMiddlewareToGroup('api.log', ApiLog::class);
    }
}
