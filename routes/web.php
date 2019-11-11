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

Route::get('/','PostsController@index');

Route::get('post/{slug}', 'PostsController@show')->name('post');

Auth::routes();

Route::prefix('admin')->group(function () {
    
    Route::get('/', "DashboardController@index")->name("index");    

    Route::get('post/create', "PostsController@create");

    Route::post('post/save', "PostsController@save")->name('save-post');

    Route::get('post/{post}/edit', "PostsController@edit")->name('edit-post');
    
    Route::put('post/{post}', "PostsController@update")->name('update-post');

    Route::delete('post/{post}', "PostsController@destroy")->name('delete-post');

});

// Route::resource('admin/posts', 'AdminController')->middleware('auth');

// Route::resource('admin/images', 'AdminController')->middleware('auth');
