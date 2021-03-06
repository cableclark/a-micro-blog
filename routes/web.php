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
use App\Mail\MessageSent;

Auth::routes();

Route::get('/admin', 'DashboardController@index')->name('admin');

Route::get('/', 'PostsController@index')->name('home');

Route::get('/about', function () {

    return view('about');   

});

Route::post('/search','PostsController@search');

Route::get('/getimages', 'ImagesController@getImages')->name('get-image');

Route::get('/getPosts', 'PostsController@getPosts')->name('get-posts');

Route::get('/ajaxPosts/{page}', 'PostsController@ajaxPosts')->name('ajax-posts');
    
Route::get('/post/{slug}/edit', 'PostsController@edit')->name('edit-post');

Route::get('/post/create', 'PostsController@create')->name('create-post');

Route::get('/post/{slug}', 'PostsController@show')->name('show-post');

Route::delete('/post/{slug}', 'PostsController@destroy')->name('delete-post');

Route::post('/post', 'PostsController@save')->name('save-post');

Route::put('/post/{slug}', 'PostsController@update')->name('update-post');



Route::get('admin/image', 'ImagesController@index')->name('show-images');

Route::get('admin/image/create', 'ImagesController@create')->name('upload-image');

Route::post('admin/image/create', 'ImagesController@save')->name('save-image');

Route::delete('/image/{id}', 'ImagesController@destroy')->name('delete-image');


Route::post('comments', 'CommentsController@save')->name('send-comment');

Route::get('/contact', 'ContactFormController@create');

Route::post('/contact', 'ContactFormController@store')->name("send-mail");
 

    


