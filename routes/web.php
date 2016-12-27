<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('revenue', 'RevenueController@index');
Route::post('revenue', 'RevenueController@store');
Route::get('revenue/data','RevenueController@data');
Route::get('revenue/filter/{month}/{year}','RevenueController@filter');
Route::get('revenue/print/{date}/{category}','RevenueController@printPDF');

Route::get('under/construction', 'ConstructionController@index');