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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/branch','BranchController');
Route::get('/branch/show','BranchController@show')->name('branch.show');
Route::delete('/branch/delete','BranchController@destroy')->name('branch.destroy');
