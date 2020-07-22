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
  Route::get('/branch/delete/{id}','BranchController@destroy');
  Route::get('branch_edit','BranchController@edit')->name('branch_edit');
  Route::post('branch/update/{id}','BranchController@update');


  //EmployeeCategory Route
  Route::resource('/employeeCategorys','EmployeeCategoryController');
  Route::get('employeeCategorys/delete/{id}','EmployeeCategoryController@destroy');
  Route::get('employeeCategorys_edit','EmployeeCategoryController@edit')->name('employeeCategorys_edit');
  Route::post('employeeCategorys/update/{id}','EmployeeCategoryController@update');

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
  Route::resource('user','UserController');
  Route::get('user/delete/{id}','UserController@destroy');
  Route::get('user_show','UserController@show')->name('user_show');

  Route::get('profile/','profileController@index');
  Route::post('profile/update','profileController@update');
  Route::post('profile/oldpass','profileController@matchpass');
  Route::post('profile/changepass','profileController@changepass');

  // Tracking Route
  Route::post('track_create','trackingController@latlonSave')->name('track_create');
  Route::get('track_map','trackingController@gmap')->name('track_map');
});
