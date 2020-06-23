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
Route::post('/member/register', 'AuthController@register');

Route::post('/member/login', 'AuthController@login');

Route::post('/member/login_check', 'AuthController@isLogin');

Route::post('/member/logout', 'AuthController@logout')->middleware('auth:sanctum');
/*
 * User routes
 */
Route::get('/user', 'UserController@get')->middleware('auth:sanctum');

Route::post('/user', 'UserController@update')->middleware('auth:sanctum');

/*
 * Location routes
 */

Route::post('/location/get', 'LocationController@get')->middleware('auth:sanctum');

Route::post('/location/create', 'LocationController@create')->middleware('auth:sanctum');

Route::post('/location/update', 'LocationController@update')->middleware('auth:sanctum');

Route::post('/location/delete', 'LocationController@delete')->middleware('auth:sanctum');

/*
 * Entry routes
 */

Route::post('/entry/get', 'EntryController@get')->middleware('auth:sanctum');

Route::post('/entry/create', 'EntryController@create')->middleware('auth:sanctum');

Route::post('/entry/update', 'EntryController@update')->middleware('auth:sanctum');

Route::post('/entry/delete', 'EntryController@delete')->middleware('auth:sanctum');
