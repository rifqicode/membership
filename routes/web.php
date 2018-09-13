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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


// rooms controller
Route::get('/rooms', 'RoomsController@index')->name('rooms');
Route::get('/rooms/create', 'RoomsController@createRoomPage')->name('createRooms');
Route::get('/rooms/create/{id_room}/item', 'RoomsController@createItemPage')->name('createItem');

Route::get('/rooms/join/{id_room}', 'RoomsController@joinRoom')->name('joinRoom');
Route::get('/rooms/unjoin/{id_room}', 'RoomsController@unJoinRoom')->name('unJoinRoom');

Route::get('/rooms/view/{id_room}', 'RoomsController@viewRoom')->name('viewRoom');

Route::post('/rooms/create/post', 'RoomsController@createRoom')->name('postRooms');
Route::post('/rooms/create/{id_room}/item/post', 'RoomsController@createItem')->name('postItem');

Route::get('/rooms/roll/{id_room}/item/now', 'RoomsController@rollItem')->name('rollItem');


// home controller
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/post/create' , 'PostingController@createPost')->name('postCreateDashboard');

// Friend Search
Route::get('/search/user/' , 'FriendController@searchUser')->name('searchFriend');

// add Friend
Route::get('/user/addfriend/{id}', 'FriendController@addFriend')->name('addFriend');

// group controller
Route::resource('/group', 'GroupController');
Route::get('/join/{id}', 'JoinController@JoinGroup');
Route::get('/leave/{id}', 'JoinController@LeaveGroup');

// ajax resource data
Route::get('/get/findEmailIfSame/{email}' , 'AjaxResourceController@findEmailIfSame');

// posting controller
Route::post('/post/like' , 'PostingController@like')->name('postLike');
Route::post('/post/create' , 'PostingController@create')->name('postCreate');
Route::post('/comments/create' , 'CommentController@createComment')->name('commentCreate');

// profile controller
Route::resource('/profile', 'ProfileController');
