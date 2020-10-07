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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('root');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/media', 'App\Http\Controllers\MediaItemController@index')->name('media');
Route::get('/media/create', 'App\Http\Controllers\MediaItemController@create')->name('media.create');
Route::post('/media/store', 'App\Http\Controllers\MediaItemController@store')->name('store.post');
Route::get('/media/{id}', 'App\Http\Controllers\MediaItemController@show')->name('media.show');

Route::post('/search', 'App\Http\Controllers\MediaItemController@search')->name('search');

Route::post('/admin', 'App\Http\Controllers\AdminController@deletePost')->name('delete.post');
Route::get('/admin', 'App\Http\Controllers\AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
