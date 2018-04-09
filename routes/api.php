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

//Company
Route::get('/company/ping', 'CompanyController@ping');
Route::get('/company/{id}/departments', 'CompanyController@getCompanyDepartments');
Route::post('/company', 'CompanyController@create');
Route::get('/company', 'CompanyController@index');
Route::get('/company/{id}', 'CompanyController@get');
Route::put('/company/{id}', 'CompanyController@update');
Route::delete('/company/{id}', 'CompanyController@delete');

//Department
Route::get('/department/ping', 'DepartmentController@ping');
Route::get('/department/{id}/positions', 'DepartmentController@getDepartmentPositions');
Route::post('/department', 'DepartmentController@create');
Route::get('/department', 'DepartmentController@index');
Route::get('/department/{id}', 'DepartmentController@get');
Route::put('/department/{id}', 'DepartmentController@update');
Route::delete('/department/{id}', 'DepartmentController@delete');

//Position
Route::get('/position/ping', 'PositionController@ping');
Route::post('/position', 'PositionController@create');
Route::get('/position', 'PositionController@index');
Route::get('/position/{id}', 'PositionController@get');
Route::put('/position/{id}', 'PositionController@update');
Route::delete('/position/{id}', 'PositionController@delete');
Route::get('/position/employees/{id}', 'PositionController@findAllEmployeesOnPosition');



//Employee
Route::get('/employee/ping', 'EmployeeController@ping');
Route::post('/employee', 'EmployeeController@create');
Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/findAll', 'EmployeeController@getEmployeeList');
Route::get('/employee/{id}', 'EmployeeController@getCompleteEmployee');
Route::put('/employee/{id}', 'EmployeeController@update');
Route::delete('/employee/{id}', 'EmployeeController@delete');

