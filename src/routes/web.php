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
        $route->name('domain.')->prefix('domain')->group(function($route){
            $route->get('index', 'BddDomainController@index')->name('index');
            $route->get('create', 'BddDomainController@create')->name('create');
            $route->post('store', 'BddDomainController@store')->name('store');
            $route->get('edit/{id}', 'BddDomainController@edit')->name('edit');
            $route->post('update/{id}', 'BddDomainController@update')->name('update');
            $route->get('delete/{id}', 'BddDomainController@delete')->name('delete');
        });
        //routes
        $route->name('feature.')->prefix('feature')->group(function($route){
            $route->get('show', 'BddFeatureController@show')->name('show');
            $route->get('create', 'BddFeatureController@create')->name('create');
        });
    });