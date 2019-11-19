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

Route::get('/login', 'DashboardController@index')->name('home');

Route::get('/post/{$slug}', 'PostsController@show')->name('show-post');

Route::put('/post/{$slug}', 'PostsController@destroy')->name('delete-post');

Route::get('/post/{$slug}/edit', 'PostsController@edit')->name('edit-post');
 
Route::get('/', 'PostsController@index')->name('admin');
    
    


