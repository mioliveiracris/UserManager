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

Route::get('/', 'App\Http\Controllers\UserController@showUsers')->name('user.list');
Route::get('/users', 'App\Http\Controllers\UserController@showUsers')->name('user.list');

Route::get('/user/create', 'App\Http\Controllers\UserController@createUser')->name('user.create');
Route::post('/user/create', 'App\Http\Controllers\UserController@saveUser');
Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@getUser')->name('user.edit');
Route::put('/user/edit/{id}', 'App\Http\Controllers\UserController@saveUpdateUser')->name('user.update');
Route::get('/user/delete/{id}', 'App\Http\Controllers\UserController@deleteUser')->name('user.delete');