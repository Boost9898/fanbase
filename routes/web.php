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

Route::get('/newsdetail', 'App\Http\Controllers\NewsDetail@show')->name('newsDetail');

Route::get('/newsadd', 'App\Http\Controllers\NewsAdd@show')->name('newsAdd');
