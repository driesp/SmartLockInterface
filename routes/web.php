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

Route::get('home', 'HomeController@hcDashboard');
Route::get('home/dashboard', 'HomeController@hcDashboard');
Route::get('home/controlpanel', 'HomeController@hcControlpanel');

/**
 * Routes for android data
 */

Route::post('android/login', 'AndroidController@login');
Route::post('android/data', 'AndroidController@data');

/**
 * Routes for locks
 */

Route::get('home/locks', 'LocksController@lcShow');
Route::get('home/lock/{Lock}/edit', 'LocksController@lcEdit');
Route::get('home/lock/create', 'LocksController@lcCreate');
Route::patch('home/lock/{Lock}', 'LocksController@lcUpdate');
Route::get('home/lock/{Lock}/delete', 'LocksController@lcDelete');
Route::get('home/lock/{Lock}/build', 'LocksController@lcBuild');
Route::post('home/lock/{Lock}/connect', 'LocksController@lcConnect');
Route::post('home/lock/store', 'LocksController@lcStore');
Route::get('home/lock/{Lock}/{User}/delete','LocksController@lcUserRemove');

/**
 * Routes for users
 */

Route::get('home/users', 'UserController@ucShow');
Route::get('home/user/{User}/edit', 'UserController@ucEdit');
Route::get('home/user/create', 'UserController@ucCreate');
Route::patch('home/user/{User}', 'UserController@ucUpdate');
Route::get('home/user/{User}/delete', 'UserController@ucDelete');
Route::get('home/profile', 'UserController@ucProfile');
Route::get('home/profile/password', 'UserController@ucPasswordChange');
Route::post('home/profile/password/update','UserController@ucPasswordUpdate');
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
Route::get('home/floorplan/{Ground}/{Building}/{Floor}/edit', 'FloorplanController@fcFloorLocks');
Route::get('home/floorplan/{Ground}/{Building}/{Floor}/{Lock}/delete', 'FloorplanController@fcFloorLockDelete');
