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
Route::post('/home/post/craete' , 'HomeController@craetePost')->name('postCreateDashboard');

Route::resource('/group', 'GroupController');
Route::get('/join/{id}', 'JoinController@JoinGroup');
Route::get('/leave/{id}', 'JoinController@LeaveGroup');

// ajax resource data
Route::get('/get/findEmailIfSame/{email}' , 'AjaxResourceController@findEmailIfSame');

// posting controller
Route::post('/post/create' , 'PostingController@create')->name('postCreate');
Route::post('/comments/create' , 'CommentController@createComment')->name('commentCreate');

// profile controller
Route::resource('/profile', 'ProfileController');
