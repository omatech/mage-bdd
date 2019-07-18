<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::namespace('Omatech\MageBdd\App\Http\Controllers')
    ->prefix(config('mage.prefix'))
    ->middleware(['web', 'setLocale', 'mageRedirectIfNotAuthenticated', 'checkForPermissions:mage-access'])
    ->name('mage-bdd.')
    ->group(function ($route) {
        // Domain Routes
        $route->name('domain.')->prefix('domain')->group(function($route){
            $route->get('index', 'BddDomainController@index')->name('index');
            $route->get('create', 'BddDomainController@create')->name('create');
            $route->post('store', 'BddDomainController@store')->name('store');
            $route->get('edit/{id}', 'BddDomainController@edit')->name('edit');
            $route->post('update/{id}', 'BddDomainController@update')->name('update');
            $route->get('delete/{id}', 'BddDomainController@delete')->name('delete');
        });
        // Feature Routes
        $route->name('feature.')->prefix('feature')->group(function($route){
            $route->get('create/{domain_id}', 'BddFeatureController@create')->name('create');
            $route->post('store', 'BddFeatureController@store')->name('store');
            $route->get('edit/{id}', 'BddFeatureController@edit')->name('edit');
            $route->post('update/{id}', 'BddFeatureController@update')->name('update');
            $route->get('delete/{id}', 'BddFeatureController@delete')->name('delete');
        });
        // Scenario Routes
        $route->name('scenario.')->prefix('scenario')->group(function($route){
            $route->post('store', 'BddScenarioController@store')->name('store');
            $route->post('update/{id}', 'BddScenarioController@update')->name('update');
            $route->get('delete/{id}', 'BddScenarioController@delete')->name('delete');
        });
        // Line Routes
        $route->name('line.')->prefix('line')->group(function($route){
            $route->post('store', 'BddLineController@store')->name('store');
            $route->post('update/{id}', 'BddLineController@update')->name('update');
            $route->get('delete/{id}', 'BddLineController@delete')->name('delete');
        });
    });