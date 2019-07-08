<?php

namespace Omatech\MageBdd\App\Providers;

use Illuminate\Support\ServiceProvider;

class PublishServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->views();
        $this->seeds();
    }

    /**
     * Register the application views.
     *
     * @return void
     */
    private function views()
    {
        $this->publishes([
            __DIR__.'/../../resources/views/pages/list.blade.php' => resource_path('views/vendor/mage-bdd/pages/list.blade.php'),
        ], 'mage-bdd-views');

    }

    /**
     * Register the application views.
     *
     * @return void
     */
    private function seeds()
    {
        $this->publishes([
            __DIR__ . '/../../database/factories/BddFactory.php' => database_path('factories/BddFactory.php'),
            __DIR__ . '/../../database/seeds/BddDomainSeeder.php' => database_path('seeds/BddDomainSeeder.php'),
        ], 'mage-bdd-seeds');
    }
}
