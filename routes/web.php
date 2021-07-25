<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('login','Auth\LoginController@login')->name('login');
Route::post('login','Auth\LoginController@authenticate')->name('login.confirm');

Route::group(['middleware'=>'auth'],function(){
  
    Route::get('dashbord', function () {
        return view('welcome');
    });
    
    Route::get('logout','Auth\LoginController@logout')->name('logout');
    
    Route::get('/admin/dashbord', function () {
        return view('layouts.admin_layout');
    })->name('admin.dashbord');
    
    Route::get('/admin/group','UserGroupsController@index')->name('admin.group');
    Route::get('/admin/group/create','UserGroupsController@create')->name('admin.group.create');
    Route::post('/admin/group/store','UserGroupsController@store')->name('admin.group.store');
    Route::delete('/admin/group/delete/{id}','UserGroupsController@destroy')->name('admin.group.delete');
    
    
    /*except here means: if i don't need any method, then we can use it.
    and also we use 'only' which is used for showing
    wishing method
    */       
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/sales','UserSalesController@index')->name('user.sales');
    Route::get('users/{id}/purchases','UserPurchasesController@index')->name('user.purchases');
    Route::get('users/{id}/payments','UserPaymentsController@index')->name('user.payments');
    Route::get('users/{id}/receipts','UserReceiptsController@index')->name('user.receipts');

    Route::resource('categories', 'CategoriesController',['except'=>'show']);
    Route::resource('products', 'ProductsController');
});


