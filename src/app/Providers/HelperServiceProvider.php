<?php

namespace Omatech\MageBdd\App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->helpers();
    }

    /**
     * Register the application helpers.
     *
     * @return void
     */
    private function helpers()
    {
        $files = array_diff(scandir(__DIR__.'/../Helpers/'), array('..', '.'));

        foreach ($files as $file) {
            require_once __DIR__.'/../Helpers/'.$file;
        }
    }
}
