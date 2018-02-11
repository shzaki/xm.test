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

Route::get('/get-symbols',  '\App\Http\Controllers\NasdaqController@getSymbols')->name('get-symbols');
Route::get('/nasdaq',  '\App\Http\Controllers\NasdaqController@getForm')->name('nasdaq');
Route::post('/nasdaq', '\App\Http\Controllers\NasdaqController@postForm')->name('nasdaq');
