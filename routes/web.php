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
    'uses' => 'MovieController@create',
    'as' => 'dashboard'
])->middleware('auth');

Route::get('/userpage', [
    'uses' => 'MovieController@index',
    'as' => 'userpage'
])->middleware('auth');


Route::resource('movies', 'MovieController')->middleware('auth');
//Makes a route for every part of CRUD in the MovieController

Route::resource('queries', 'QueryController');

Route::get('movie/search', 'MovieController@search')->name('movies.search');
//Searchquery for searchmovie

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/updateaccount', [
    'uses' => 'UserController@saveAccount',
    'as' => 'account.save'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');