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
//Employee
// Route::post('/rest/employee/create', 'EmployeeController@create');
// Route::get('/rest/employee/{id}', 'EmployeeController@get');
// Route::put('/rest/employee/update/{id}', 'EmployeeController@update');
// Route::delete('/rest/employee/delete/{id}', 'EmployeeController@delete');

//Position
// Route::post('/rest/position/create', 'PositionController@create');
// Route::get('/rest/position/{id}', 'PositionController@get');
// Route::put('/rest/position/update/{id}', 'PositionController@update');
// Route::delete('/rest/position/delete/{id}', 'PositionController@delete');
