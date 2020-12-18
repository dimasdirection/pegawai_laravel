<?php

use Illuminate\Http\Request;
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

Route::get('admins', 'AdminController@index');

Route::post('admins/insert', 'AdminController@store');

Route::put('admins/update/{id_admin}', 'AdminController@update');

Route::delete('admins/delete/{id_admin}', 'AdminController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
