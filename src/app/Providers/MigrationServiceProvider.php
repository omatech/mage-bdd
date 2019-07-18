<?php

namespace Omatech\MageBdd\App\Providers;

use Omatech\Mage\App\Providers\MigrationServiceProvider as MageMigrationServiceProvider;
use Illuminate\Filesystem\Filesystem;


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
        $create_bdd_domains_table = __DIR__ . '/../../database/migrations/0001_create_bdd_domains_table.php.stub';
        $create_bdd_features_table = __DIR__ . '/../../database/migrations/0002_create_bdd_features_table.php.stub';
        $create_bdd_stories_table = __DIR__ . '/../../database/migrations/0003_create_bdd_scenarios_table.php.stub';
        $create_bdd_lines_table = __DIR__ . '/../../database/migrations/0004_create_bdd_lines_table.php.stub';

        $this->publishes([
            $create_bdd_domains_table => $this->getMigrationFileName(new Filesystem(), 'create_bdd_domains_table'),
            $create_bdd_features_table => $this->getMigrationFileName(new Filesystem(), 'create_bdd_features_table'),
            $create_bdd_stories_table => $this->getMigrationFileName(new Filesystem(), 'create_bdd_scenarios_table'),
            $create_bdd_lines_table => $this->getMigrationFileName(new Filesystem(), 'create_bdd_z_lines_table')
        ]);
    }
}
