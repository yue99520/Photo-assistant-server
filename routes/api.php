<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Auth routes
 */
Route::post('/register', 'Auth\AuthController@register');

Route::post('/login', 'Auth\AuthController@login');

Route::post('/login_check', 'Auth\AuthController@isLogin')->middleware('auth:sanctum');

Route::post('/logout', 'Auth\AuthController@logout')->middleware('auth:sanctum');
/*
 * User routes
 */
Route::get('/user', 'UserController@get')->middleware('auth:sanctum');

Route::post('/user', 'UserController@update')->middleware('auth:sanctum');

/*
 * Location routes
 */

Route::get('/location/all', 'Location\LocationController@getAll')->middleware('auth:sanctum');

Route::get('/location/{id}', 'Location\LocationController@getOne')->middleware('auth:sanctum');

Route::post('/location/create', 'Location\LocationController@create')->middleware('auth:sanctum');

Route::post('/location/update', 'Location\LocationController@update')->middleware('auth:sanctum');

Route::post('/location/delete', 'Location\LocationController@delete')->middleware('auth:sanctum');

/*
 * Entry routes
 */

Route::post('/entry/get', 'Entry\EntryController@get')->middleware('auth:sanctum');

Route::post('/entry/create', 'Entry\EntryController@create')->middleware('auth:sanctum');

Route::post('/entry/update', 'Entry\EntryController@update')->middleware('auth:sanctum');

Route::post('/entry/delete', 'Entry\EntryController@delete')->middleware('auth:sanctum');
