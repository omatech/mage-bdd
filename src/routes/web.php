<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::namespace('Omatech\MageBdd\App\Http\Controllers')
    ->prefix(config('mage.prefix'))
    ->middleware('web')
    ->name('mage-bdd.')
    ->group(function ($route) {
        //routes
        $route->get('index', 'BddController@index')->name('index');
    });