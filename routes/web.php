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
    // return view('welcome');
    return view('welcome');
});

Route::get('/posts', 'PostController');
Route::post('/posts', 'PostController');

// Route::resource('/posts','PostsController');

// Route::get('/home', 'HomeController')->name('home');

//index,showはログインせずアクセス可能
// Route::resource('posts','PostsController', ['only' => ['index','show','store', 'create', 'update', 'destroy', 'delete', 'edit']]);

Route::group(['middleware' => 'auth'], function () {
    
    Route::auth();
    
    Route::resource('/posts', 'PostsController', ['only' => ['store', 'create', 'update', 'destroy', 'delete', 'edit']]);
    //   Route::resource('/posts', 'PostsController', ['only' => [index','show','store', 'create', 'update', 'destroy', 'delete', 'edit']]);
    // Route::resource('/posts', 'PostsController', ['only' => ['index','show']]);
    
});

Auth::routes();


