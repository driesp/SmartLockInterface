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

/**
 * Basic home routes
 */

Route::get('home', 'HomeController@dashboard');
Route::get('home/dashboard', 'HomeController@dashboard');
Route::get('home/controlpanel', 'HomeController@controlpanel');

/**
 * Routes for android data
 */

Route::post('android/login', 'AndroidController@login');
Route::post('android/data', 'AndroidController@data');

/**
 * Routes for locks
 */

Route::get('home/locks', 'LocksController@show');
Route::get('home/lock/{Lock}/edit', 'LocksController@edit');
Route::get('home/lock/create', 'LocksController@create');
Route::patch('home/lock/{Lock}', 'LocksController@update');
Route::get('home/lock/{Lock}/delete', 'LocksController@delete');
Route::post('home/lock/{Lock}/connect', 'LocksController@connect');
Route::post('home/lock/store', 'LocksController@store');
Route::get('home/lock/{Lock}/{User}/delete','LocksController@removeUser');

/**
 * Routes for users
 */

Route::get('home/users', 'UserController@show');
Route::get('home/user/{User}/edit', 'UserController@edit');
Route::get('home/user/create', 'UserController@create');
Route::patch('home/user/{User}', 'UserController@update');
Route::get('home/user/{User}/delete', 'UserController@delete');
Route::get('home/profile', 'UserController@profile');
/**
 * Routes for floorplan
 */

Route::get('home/floorplan', 'FloorplanController@fcGroundsShow');
Route::get('home/floorplan/create', 'FloorplanController@fcGroundCreate');
Route::get('home/floorplan/{Ground}', 'FloorplanController@fcGroundView');
Route::post('home/floorplan/insert', 'FloorplanController@fcGroundDatabaseInsert');
Route::get('home/floorplan/{Ground}/building', 'FloorplanController@fcBuildingCreate');
Route::post('home/floorplan/{Ground}/insert', 'FloorplanController@fcBuildingInsert');
Route::get('home/floorplan/{Ground}/{Building}', 'FloorplanController@fcBuildingView');
Route::get('home/floorplan/{Ground}/{Building}/createfloor', 'FloorplanController@fcFloorCreate');
Route::post('home/floorplan/{Ground}/{Building}/insertfloor', 'FloorplanController@fcFloorInsert');
Route::get('home/floorplan/{Ground}/{Building}/{Floor}', 'FloorplanController@fcFloorView');
Route::get('home/floorplan/{Ground}/{Building}/{Floor}/addlock', 'FloorplanController@fcFloorLockAdd');
Route::post('home/floorplan/{Ground}/{Building}/{Floor}/insertlock', 'FloorplanController@fcFloorLockInsert');
