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

Route::get('/', 'Frontend\FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){

    Route::prefix('users')->group(function(){

        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete', 'Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){

        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/store', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');

    });

    Route::prefix('categories')->group(function(){

        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::post('/delete', 'Backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('employees')->group(function(){

        Route::get('/view', 'Backend\EmployeeController@view')->name('employees.view');
        Route::get('/add', 'Backend\EmployeeController@add')->name('employees.add');
        Route::post('/store', 'Backend\EmployeeController@store')->name('employees.store');
        Route::get('/edit/{id}', 'Backend\EmployeeController@edit')->name('employees.edit');
        Route::post('/update/{id}', 'Backend\EmployeeController@update')->name('employees.update');
        Route::post('/delete', 'Backend\EmployeeController@delete')->name('employees.delete');
    });

    Route::prefix('assets')->group(function(){

        Route::get('/view', 'Backend\AssetController@view')->name('assets.view');
        Route::get('/add', 'Backend\AssetController@add')->name('assets.add');
        Route::post('/store', 'Backend\AssetController@store')->name('assets.store');
        Route::get('/edit/{id}', 'Backend\AssetController@edit')->name('assets.edit');
        Route::post('/update/{id}', 'Backend\AssetController@update')->name('assets.update');
        Route::post('/delete', 'Backend\AssetController@delete')->name('assets.delete');
    });

    Route::prefix('allocates')->group(function(){

        Route::get('/view', 'Backend\AllocateController@view')->name('allocates.view');
        Route::get('/add', 'Backend\AllocateController@add')->name('allocates.add');
        Route::post('/store', 'Backend\AllocateController@store')->name('allocates.store');
        Route::get('/edit/{id}', 'Backend\AllocateController@edit')->name('allocates.edit');
        Route::post('/update/{id}', 'Backend\AllocateController@update')->name('allocates.update');
        Route::post('/delete', 'Backend\AllocateController@delete')->name('allocates.delete');
    });

    // Get Category By Ajax
    Route::get('/get-category', 'Backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product', 'Backend\DefaultController@getProduct')->name('get-product');

    Route::get('/get/stock', 'Backend\DefaultController@getStock')->name('check-product-stock');

});
