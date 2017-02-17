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

Route::get('home', 'HomeController@dashboard');
Route::get('home/dashboard', 'HomeController@dashboard');
Route::get('home/controlpanel', 'HomeController@controlpanel');

Route::post('android/login', 'AndroidController@login');
Route::post('android/data', 'AndroidController@data');

Route::get('home/locks', 'LocksController@show');

Route::get('home/lock/{Lock}/edit', 'LocksController@edit');
Route::get('home/lock/create', 'LocksController@create');

Route::patch('home/lock/{Lock}', 'LocksController@update');
Route::get('home/lock/{Lock}/delete', 'LocksController@delete');
Route::post('home/lock/{Lock}/connect', 'LocksController@connect');
Route::post('home/lock/store', 'LocksController@store');
Route::get('home/lock/{Lock}/{User}/delete','LocksController@removeUser');
Route::get('home/users', 'UserController@show');

Route::get('home/user/{User}/edit', 'UserController@edit');
Route::get('home/user/create', 'UserController@create');

Route::patch('home/user/{User}', 'UserController@update');
Route::get('home/user/{User}/delete', 'UserController@delete');
