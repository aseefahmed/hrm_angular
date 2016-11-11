<?php

Route::group(['middleware' => 'web', 'prefix' => 'production', 'namespace' => 'Modules\Production\Http\Controllers'], function()
{
	Route::get('/', ['uses' => 'ProductionController@index', 'as' => 'Production']);
    Route::get('/buyers', ['uses' => 'BuyersController@index', 'as' => 'Buyers']);
    Route::post('/buyers/add', ['uses' => 'BuyersController@addBuyer', 'as' => 'Buyers']);
    Route::get('/buyers/all', ['uses' => 'BuyersController@getAll', 'as' => 'Buyers']);
});