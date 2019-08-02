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

Route::resource('posts','PostsController');

// Route::get('/home', 'HomeController@index')->name('home');

//index,showはログインせずアクセス可能
Route::resource('posts','PostsController',['only' => ['index','show']]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', 'PostsController', ['only' => ['store', 'create', 'update', 'destroy', 'delete', 'edit']]);
});

Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
