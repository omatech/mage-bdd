<?php

namespace Omatech\MageBdd\App\Providers;

use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->middlewares();
    }

    /**
     * Register the application middlewares.
     *
     * @return void
     */
    private function middlewares()
    {
        //$this->app['router']->aliasMiddleware('alias', 'class');
    }
}
