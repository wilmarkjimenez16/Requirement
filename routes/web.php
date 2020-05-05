<?php

use Illuminate\Support\Facades\Route;

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

//Route::resource('', 'EmployeeController');

Route::get('/', 'EmployeeController@index');
Route::post('/', 'EmployeeController@store');
Route::get('/{employee}', 'EmployeeController@show');
Route::get('/{employee}/edit', 'EmployeeController@edit');
Route::patch('{employee}', 'EmployeeController@update');
Route::delete('{employee}', 'EmployeeController@destroy');