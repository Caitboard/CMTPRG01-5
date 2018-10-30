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

Route::get('/', 'PagesController@getWelcome')->name('login');
Route::get('/signin', 'PagesController@getSignIn');
Route::get('/signup', 'PagesController@getSignUp');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/dashboard', [
    'uses' => 'UserController@getDashboard',
    'as' => 'dashboard'])
//])->middleware('auth');
;

Route::resource('movies', 'MovieController');
//Makes a route for every part of CRUD in the MovieController


Route::get('logout', 'Auth\LoginController@logout')->name('logout');