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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashbord', function () {
    return view('layouts.admin_layout');
})->name('admin.dashbord');

Route::get('/admin/group','UserGroupsController@index')->name('admin.group');
Route::get('/admin/group/create','UserGroupsController@create')->name('admin.group.create');

Route::get('/admin/user','UsersController@index')->name('admin.user');

