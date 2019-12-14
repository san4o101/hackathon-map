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

Route::get('/', 'MapController@index')->name('usersMap');
Route::get('/user/map', 'MapController@map')->name('usersMapFilter');

// Authentication Routes...
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', 'HomeController@map')->name('map');
Route::post('/create', 'HomeController@create')->name('create');
