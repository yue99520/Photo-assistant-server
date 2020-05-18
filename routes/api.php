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
Route::post('/register', 'Api\TokenController@register');

Route::post('/login', 'Api\TokenController@login');

Route::post('/logout', 'Api\TokenController@logout')->middleware('auth:sanctum');

/*
 * User routes
 */
Route::get('/user', 'UserController@get')->middleware('auth:sanctum');

Route::post('/user', 'UserController@update')->middleware('auth:sanctum');
