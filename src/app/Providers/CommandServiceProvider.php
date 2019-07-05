<?php

namespace Omatech\MageBdd\App\Providers;

use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->consoleCommands();
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    private function consoleCommands()
    {
        //$this->commands('class');
    }
}
