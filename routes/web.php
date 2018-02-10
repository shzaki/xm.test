<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});
Route::get('/mail', function () {
	Mail::to('sh_zaki@yahoo.com')->send(new NasdaqQuotes());

	return view('test');
});

Route::post('/test', '\App\Http\Controllers\NasdaqController@postForm');
