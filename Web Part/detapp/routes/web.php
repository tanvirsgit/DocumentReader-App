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

// Routes for web pages
Route::get('/', 'PagesController@index');
Route::get('/help', 'PagesController@help');
Route::get('/about', 'PagesController@about');

// Routes after login/dashboard
Route::get('/dashboard', 'DashboardController@index');

// Routes for documents/upload/delete options
Route::resource('/documents', 'DocumentsController');

// Routes for auth / Laravel Login
Auth::routes();

// Routes for social providers
//Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// Routes for facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// Routes for google
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// Routes for github
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


