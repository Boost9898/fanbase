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

Route::get('/welcome', 'App\Http\Controllers\Welcome@show')->name('welcome');
Route::get('/news', 'App\Http\Controllers\News@show')->name('news');
Route::get('/news/create', 'App\Http\Controllers\NewsController@create')->name('news.create');
Route::post('/news/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
Route::get('/news/{id}', 'App\Http\Controllers\NewsController@show')->name('news.show');

Route::get('/newsdetail', 'App\Http\Controllers\NewsDetail@show')->name('newsDetail');

