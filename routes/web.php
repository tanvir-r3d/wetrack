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
    return redirect('/home');
});

Route::get('localization/{locale}','HomeController@local');

Route::get('/search', 'HomeController@search');
Auth::routes(['verify' => true]);
Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // Company Route
    Route::resource('/company', 'CompanyController');
    Route::get('company/delete/{id}', 'CompanyController@destroy');
    Route::get('company_edit', 'CompanyController@edit')->name('company_edit');
    Route::post('company/update/{id}', 'CompanyController@update');

    //Branch Route
    Route::resource('/branch', 'BranchController');
    Route::get('/branch/delete/{id}', 'BranchController@destroy');
    Route::get('branch_edit', 'BranchController@edit')->name('branch_edit');
    Route::post('branch/update/{id}', 'BranchController@update');

    //EmployeeCategory Route
    Route::resource('/employeeCategorys', 'EmployeeCategoryController');
    Route::get('employeeCategorys/delete/{id}', 'EmployeeCategoryController@destroy');
    Route::get('employeeCategorys_edit', 'EmployeeCategoryController@edit')->name('employeeCategorys_edit');
    Route::post('employeeCategorys/update/{id}', 'EmployeeCategoryController@update');

    //Employee Route
    Route::resource('/employee', 'EmployeeController');
    Route::get('/employee/delete/{id}', 'EmployeeController@destroy');
    Route::get('employee_edit', 'EmployeeController@edit')->name('employee_edit');
    Route::post('employee/update/{id}', 'EmployeeController@update');

    // Employee In Field
    Route::get('employee_status/', 'EmployeeStatusController@index');
    Route::get('employee_status/change', 'EmployeeStatusController@statusChange')->name('employee_status.change');

    //User Profile Route
    Route::resource('user', 'UserController');
    Route::get('user/delete/{id}', 'UserController@destroy');
    Route::get('user_show', 'UserController@show')->name('user_show');
    Route::post('user/image/{id}', 'UserController@image');

    Route::get('profile/', 'profileController@index');
    Route::post('profile/update', 'profileController@update');
    Route::post('profile/oldpass', 'profileController@matchpass');
    Route::post('profile/changepass', 'profileController@changepass');

    // Tracking Route
    Route::post('track_create', 'trackingController@latlonSave')->name('track_create');
    Route::get('track/get', 'trackingController@get');

    //  Setting Route
    Route::resource('/settings', 'SettingController');
    Route::post('/settings/mail', 'SettingController@mail');


    //Role Route
    Route::resource('/role', 'RoleController');
    Route::get('/role/delete/{id}', 'RoleController@delete');
    Route::get('role_edit', 'RoleController@edit')->name('role_edit');
    Route::post('role/update/{id}', 'RoleController@update');

    //Permission
    Route::resource('/permission', 'PermissionController');

    //Role Permmission
    Route::get('/role_permission', 'Role_PermissionController@index');
    Route::get('/role_permission/{id}', 'Role_PermissionController@edit');
    Route::put('/role_permission/{id}/update', 'Role_PermissionController@update');

    //USER ROLE
    Route::get('/user_roles','UserRoleController@index');
    Route::get('/user_roles/{id}','UserRoleController@edit');
    Route::put('/user_roles/update/{id}','UserRoleController@update');
});
Route::get("/about_us", function () {
    return view("About Us.about_us");
});
