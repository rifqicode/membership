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
    return view('welcome');
});

Auth::routes();

// home controller
Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
Route::resource('/group', 'GroupController');
Route::get('/join/{id}', 'JoinController@JoinGroup');
Route::get('/leave/{id}', 'JoinController@LeaveGroup');
=======

// profile controller
Route::resource('/profile', 'ProfileController');
>>>>>>> c0e7329cf7301ad857a446c777328cc5dac97600
