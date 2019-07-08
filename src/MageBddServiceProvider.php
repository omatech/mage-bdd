<?php

namespace Omatech\MageBdd;

use Illuminate\Support\ServiceProvider;
use Omatech\MageBdd\App\Providers\PublishServiceProvider;
use Omatech\MageBdd\App\Providers\ViewServiceProvider;
use Omatech\MageBdd\App\Providers\HelperServiceProvider;
use Omatech\MageBdd\App\Providers\CommandServiceProvider;
use Omatech\MageBdd\App\Providers\RoutingServiceProvider;
use Omatech\MageBdd\App\Providers\MigrationServiceProvider;
use Omatech\MageBdd\App\Providers\MiddlewareServiceProvider;
use Omatech\MageBdd\App\Providers\ConfigurationServiceProvider;

class MageBddServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        if (in_array('mage-bdd', config('mage.plugins'))) {
            $this->app->register(CommandServiceProvider::class);
            $this->app->register(ConfigurationServiceProvider::class);
            $this->app->register(HelperServiceProvider::class);
            $this->app->register(MiddlewareServiceProvider::class);
            $this->app->register(MigrationServiceProvider::class);
            $this->app->register(RoutingServiceProvider::class);
            $this->app->register(ViewServiceProvider::class);
            $this->app->register(PublishServiceProvider::class);
        }
    }
}
