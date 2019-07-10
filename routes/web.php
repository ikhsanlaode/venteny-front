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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/','DashboardController@index')->name('dashboard');
Route::get('/login-view','AuthController@loginView')->name('login.view');
Route::post('/login','AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/employee/create','EmployeeController@create');
Route::post('/employee/store','EmployeeController@store')->name('employee.store');
Route::get('/vacation','VacationController@index')->name('vacation');
Route::get('/vacation/max/create','VacationController@createMax')->name('vacation.max.create');
Route::post('/vacation/max/','VacationController@storeMax')->name('vacation.max.store');
Route::get('/vacation/create','VacationController@create')->name('vacation.create');
Route::post('/vacation/','VacationController@store')->name('vacation.store');
Route::get('/vacation/approve/{id}','VacationController@approve');
Route::get('/vacation/reject/{id}','VacationController@reject');

