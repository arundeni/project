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



Route::get('/home','UserController@index');

Route::get('/auth','AdminController@showlogin');
Route::post('/auth','AdminController@dologin');

Route::post('/auth', 'AdminController@dologin')->name('login');

Route::get('/logout','AdminController@logout');

Route::get('/home/audio_form','UserController@showaudio');
Route::post('/home/audio_form/save','UserController@doaudio');

Route::get('/home/video_form','UserController@showvideo');
Route::post('/home/video_form/save','UserController@dovideo');

Route::get('/home/user_form','UserController@showuser');
Route::post('/home/user_form/save','UserController@douser');

Route::get('/home/audio','UserController@viewaudio');
Route::get('/home/audio/{id}/edit','UserController@editaudio');
Route::post('/home/audio/{id}/update','UserController@updateaudio');
Route::get('/home/audio/{id}/delete','UserController@deleteaudio');

Route::get('audio/{i}','JsonController@chunkaudio');

Route::get('/home/video','UserController@viewvideo');
Route::get('/home/video/{id}/edit','UserController@editvideo');
Route::post('/home/video/{id}/update','UserController@updatevideo');
Route::get('/home/video/{id}/delete','UserController@deletevideo');

Route::get('video/{category}/{i}','JsonController@chunkvideo');

Route::get('/home/user','UserController@viewuser');
Route::get('/home/user/{id}/edit','UserController@edituser');
Route::post('/home/user/{id}/update','UserController@updateuser');
Route::get('/home/user/{id}/delete','UserController@deleteuser');


Route::get('/home/audio_form/{id1}/delete/{id}','UserController@deletesong');

Route::get('/test','UserController@test');
