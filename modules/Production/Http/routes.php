<?php

Route::group(['middleware' => 'web', 'prefix' => 'production', 'namespace' => 'Modules\Production\Http\Controllers'], function()
{
	Route::get('/', ['uses' => 'ProductionController@index', 'as' => 'Production']);
    Route::get('/buyers', ['uses' => 'BuyersController@index', 'as' => 'Buyers']);
    Route::get('/fetchBuyersList', ['uses' => 'BuyersController@fetchBuyersList', 'as' => 'Buyers List']);
    Route::post('/buyers/add', ['uses' => 'BuyersController@addBuyer', 'as' => 'Buyers']);
    Route::post('/buyers/update', ['uses' => 'BuyersController@update', 'as' => 'Buyers']);
    Route::get('/buyers/all', ['uses' => 'BuyersController@getAll', 'as' => 'Buyers']);
    Route::get('/buyer/show/{id}', ['uses' => 'BuyersController@show', 'as' => 'Buyer Details']);
    Route::get('/buyer/fetchBuyerDetails/{id}', ['uses' => 'BuyersController@fetchBuyerDetails', 'as' => 'Buyer Details']);
    Route::get('/buyer/edit/{id}', ['uses' => 'BuyersController@viewBuyerEditForm', 'as' => 'Edit Buyer Details']);
    Route::delete('/buyer/{buyer}', ['uses' => 'BuyersController@destroy', 'as' => 'Remove Buyer Details']);
});