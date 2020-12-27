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
    return view('auth/register');
});

Route::get('/register', 'Auth\AuthController@register')->name('register');
Route::post('/register', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('/home', 'Auth\AuthController@home')->name('home');


Route::group(['middleware' => ['Admin']], function () {

    Route::get('/users', 'UserController@getData')->name('getData');
    Route::get('/editUser/{id}', 'UserController@editUser')->name('editUser');
    Route::post('/editUser/{id}', 'UserController@updateUser')->name('updateUser');
    Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('deleteUser');

    Route::get('/allGroup', 'UserController@allGroup')->name('allGroup');

    Route::get('/tasks', 'TasksController@getTasks')->name('getTasks');
    Route::get('/deleteTask/{id}', 'TasksController@deleteTask')->name('deleteTask');
    Route::get('/editTask/{id}', 'TasksController@editTask')->name('editTask');
    Route::post('/editTask/{id}', 'TasksController@updateTask')->name('updateTask');

    Route::get('/createTask', 'TasksController@createTask')->name('createTask');
    Route::post('/saveTask', 'TasksController@saveTask')->name('saveTask');
});

Route::group(['middleware' => ['User']], function () {
   

    Route::post('/updateMyTask/{id}', 'TasksController@updateMyTask')->name('updateMyTask');

    Route::get('/myGroup', 'UserController@myGroup')->name('myGroup');

});
    Route::get('/showeditTask/{id?}', 'TasksController@showeditTask')->name('showeditTask');
