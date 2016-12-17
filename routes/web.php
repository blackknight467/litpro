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

Route::get('/', ['uses' => 'BandController@index', 'as' => 'bandIndex']);
Route::get('/band/edit/{id}/', ['uses' => 'BandController@edit', 'as' => 'bandEdit'])
    ->where('id', '[0-9]+');
Route::put('/band/update/{id}/', ['uses' => 'BandController@update', 'as' => 'bandUpdate'])
    ->where('id', '[0-9]+');
Route::delete('/band/delete/{id}/', ['uses' => 'BandController@delete', 'as' => 'bandDelete'])
    ->where('id', '[0-9]+');
