<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Employee
Route::get('/employee', 'EmployeeController@index');
Route::post('/employee', 'EmployeeController@create');
Route::get('/employee/{id}', 'EmployeeController@get');
Route::put('/employee/{id}', 'EmployeeController@update');
Route::delete('/employee/{id}', 'EmployeeController@delete');

//Position
Route::get('/position', 'PositionController@index');
Route::post('/position', 'PositionController@create');
Route::get('/position/{id}', 'PositionController@get');
Route::put('/position/{id}', 'PositionController@update');
Route::delete('/position/{id}', 'PositionController@delete');
