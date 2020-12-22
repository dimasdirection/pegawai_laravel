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

//Router Admin
Route::get('admins', 'AdminController@index');

Route::post('admins/insert', 'AdminController@store');

Route::put('admins/update/{id_admin}', 'AdminController@update');

Route::delete('admins/delete/{id_admin}', 'AdminController@destroy');

//Router Employee
Route::get('employees', 'EmployeeController@index');

Route::post('employees/insert', 'EmployeeController@store');

Route::put('employees/update/{id_employee}', 'EmployeeController@update');

Route::delete('employees/delete/{id_employee}', 'EmployeeController@destroy');

//Router Off Work

Route::get('offworks', 'OffWorkController@index');

Route::post('offworks/insert', 'OffWorkController@store');

Route::put('offworks/update/{id_off_work}', 'OffWorkController@update');

Route::delete('offworks/delete/{id_off_work}', 'OffWorkController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
