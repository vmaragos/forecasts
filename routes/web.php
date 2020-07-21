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

Route::get('/welcome', function () {
    return view('old_welcome');
});

Route::get('/', function () {
    return redirect('/search');
    // return view('current');
});

Route::get('/search', function () {
    return view('search');
});

// Route::get('/popular', function () {
//     return view('popular');
// });

Route::get('/popular', 'ForecastsController@index')->name('forecasts.index');

Route::get('/owm', function () {
    return redirect('http://api.openweathermap.org/data/2.5/weather?q=Athens&appid=edf5aedc4d7ff735d0d1a6d2c9397af2');
});

Route::get('/search/results', 'ForecastsController@show')->name('forecasts.show');
