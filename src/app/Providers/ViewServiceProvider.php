<?php

namespace Omatech\MageBdd\App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->views();

    }

    /**
     * Register the application views.
     *
     * @return void
     */
    private function views()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'mage-bdd');

        $this->app['view']->addNamespace('mage-bdd',  __DIR__.'/../../resources/views');
    }
}
