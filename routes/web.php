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

Auth::routes();


// added by sudheer
Route::get('/redirect', 'SocialAuthTwitterController@redirect');
Route::get('/callback', 'SocialAuthTwitterController@callback');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tweets', 'SocialAuthTwitterController@tweets')->name('tweets');
Route::get('/email', 'SocialAuthTwitterController@email')->name('email');



