<?php

namespace Omatech\MageBdd\App\Providers;

use Illuminate\Support\ServiceProvider;

class RoutingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->routing();
    }

    /**
     * Register the application routes.
     *
     * @return void
     */
    private function routing()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }
}
