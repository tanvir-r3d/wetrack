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


Route::get('/','HomeController@index');
Auth::routes();
Route::middleware('auth')->group(function () {
  
  Route::get('/home', 'HomeController@index')->name('home');
  
  // Company Route
  Route::resource('/company','CompanyController');
  Route::get('company/delete/{id}','CompanyController@destroy');
  Route::get('company_edit','CompanyController@edit')->name('company_edit');
  Route::post('company/update/{id}','CompanyController@update');

  //Branch Route
  Route::resource('/branch','BranchController');
  Route::get('/branch/show','BranchController@show')->name('branch.show');
  Route::delete('/branch/delete','BranchController@destroy')->name('branch.destroy');
  Route::get('branch_edit','BranchController@b_edit');
  Route::post('/branch/update','BranchController@update')->name('branch.update');
  
  
  //EmployeeCategory Route
  Route::resource('/employeeCategorys','EmployeeCategoryController');
  Route::get('employeeCategorys/show','EmployeeCategoryController@show')->name('employeeCategorys.show');
  Route::delete('employeeCategorys/delete','EmployeeCategoryController@destroy')->name('employeeCategorys.destroy');
  Route::get('employeeCategorys_edit','EmployeeCategoryController@cat_edit');
  Route::post('employeeCategorys/update','EmployeeCategoryController@update')->name('employeeCategorys.update');
  
  //Employee Route
  Route::resource('/employee','EmployeeController');
  Route::get('employee/show','EmployeeController@show')->name('employee.show');
  Route::delete('employee/delete','EmployeeController@destroy')->name('employee.destroy');
  Route::get('employee_edit','EmployeeController@emp_edit');
  Route::post('employee/update','EmployeeController@update')->name('employee.update');
  
  // Employee In Field
  Route::get('employee_status/','EmployeeStatusController@index');
  Route::get('employee_status/list','EmployeeStatusController@create');
  Route::get('employee_status/change','EmployeeStatusController@statusChange')->name('employee_status.change');
  
  //User Profile Route
  Route::resource('profile','UserController');
  Route::get('profile_list','UserController@create')->name('user.create');
  Route::post('profile_store','UserController@store')->name('user.store');
  Route::get('profile_settings','UserController@settings');
  Route::post('profile/oldpass','UserController@matchpass');
  Route::post('profile/changepass','UserController@changepass');

  // Tracking Route
  Route::post('track_create','trackingController@latlonSave')->name('track_create');
  Route::get('track_map','trackingController@gmap')->name('track_map');
});