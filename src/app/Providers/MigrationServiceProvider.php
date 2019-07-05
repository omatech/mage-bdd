<?php

namespace Omatech\MageBdd\App\Providers;

use Omatech\Mage\App\Providers\MigrationServiceProvider as MageMigrationServiceProvider;

class MigrationServiceProvider extends MageMigrationServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->migrations();
    }

    /**
     * Register the application routes.
     *
     * @return void
     */
    private function migrations()
    {
        //$migration = __DIR__.'/../../database/migrations/migration.php.stub';

        /*$this->publishes([
            $migration => $this->getMigrationFileName(new Filesystem(), 'migration')
        ]);*/
    }
}
