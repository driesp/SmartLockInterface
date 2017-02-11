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

Route::get('/home', 'HomeController@dashboard');
Route::get('/home/dashboard', 'HomeController@dashboard');
Route::get('/home/controlpanel', 'HomeController@controlpanel');
Route::get('/home/locks', 'LocksController@show');
Route::get('home/locks/{Lock}/edit', 'LocksController@edit');
Route::get('/home/users', 'HomeController@users');
