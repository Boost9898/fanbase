<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'App\Http\Controllers\Welcome@show')->name('home');
Route::get('/media', 'App\Http\Controllers\MediaController@index')->name('media');
Route::get('/media/create', 'App\Http\Controllers\MediaController@create')->name('media.create');
Route::post('/media/store', 'App\Http\Controllers\MediaController@store')->name('media.store');
Route::get('/media/{id}', 'App\Http\Controllers\MediaController@show')->name('media.show');
