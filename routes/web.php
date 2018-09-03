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

Route::group(['middleware' => ['XSS', 'CORS']], function () {
	Route::get('/', 'PageController@index');
	Route::get('kontak-kami', 'PageController@getKontak');
	Route::get('tentang-kami', 'PageController@getTentang');
	Route::get('client', 'PageController@getClient');
	Route::get('galeri', 'PageController@getGallery');
});

Route::group(['middleware' => ['guest', 'XSS', 'CORS'], 'prefix' => 'intive'], function () {
	Route::get('/', 'AuthController@getLogin')->name('login');
	Route::post('/', 'AuthController@doLogin');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'XSS', 'CORS']], function () {
	Route::get('main', 'MainController@index');
	Route::get('logout', 'MainController@doLogout');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
