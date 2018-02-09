<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nta','NTAController@index');
Route::get('/nta/form','NTAController@form');
Route::get('/nta/{nta}','NTAController@show');
Route::post('/nta/store','NTAController@store');
Route::post('/nta/search','NTAController@search');
Route::get('/div/load_subdivisions/{id}', 'DivisionController@loadSubDivisions');
Route::resource('div', 'DivisionController');
Route::get('/test/form','testController@form');
Route::post('/test/store','testController@store');