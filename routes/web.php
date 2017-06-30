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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/users/{id}', 'UserController@show')->name('profile');



Route::get('/themes/', 'ThemeController@index')->name('themes');
Route::get('/themes/{id}', 'ThemeController@show')->name('topics');



Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/create/theme','ThemeController@create')->name('theme_create');
    Route::post('/create/theme','ThemeController@store');
    Route::get('/users/', 'UserController@index')->name('users');
    Route::get('/themes/edit/{id}', 'ThemeController@edit')->name('theme_edit');
    Route::post('/themes/edit/{id}','ThemeController@update');
    Route::get('/theme/delete/{id}','ThemeController@destroy')->name('theme_delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users/edit/{id}', 'UserController@edit')->name('profile_edit');
    Route::post('/users/edit/{id}','UserController@update');
    Route::get('/themes/{Theme_id}/edit/{id}', 'TopicController@edit')->name('topic_edit');
    Route::post('/themes/{Theme_id}/edit/{id}', 'TopicController@update');
    Route::get('/themes/{Theme_id}/delete/{id}', 'TopicController@destroy')->name('topic_delete');

    Route::get('/themes/{Theme_id}/create/topic','TopicController@create')->name('topic_create');
    Route::post('/themes/{Theme_id}/create/topic','TopicController@store');

    Route::get('/reply/edit/{id}', 'ReplyController@edit')->name('reply_edit');
    Route::post('/reply/edit/{id}','ReplyController@update');
    Route::get('/reply/delete/{id}', 'ReplyController@destroy')->name('reply_delete');
    Route::post('/themes/{Theme_id}/{id}', 'ReplyController@store');
});


Route::get('/themes/{Theme_id}/{id}', 'TopicController@show')->name('post');

