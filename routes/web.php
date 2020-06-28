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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories','CategoriesController@index')->name('categories');

Route::get('/categories/create','CategoriesController@create')->name('category.create');

Route::post('/categories/store','CategoriesController@store')->name('category.store');

Route::get('/categories/edit/{id}','CategoriesController@edit')->name('category.edit');

Route::post('/categories/update/{id}','CategoriesController@update')->name('category.update');

Route::get('/categories/delete/{id}','CategoriesController@destroy')->name('category.delete');


Route::get('/posts','PostsController@index')->name('posts');

Route::get('/posts/create','PostsController@create')->name('post.create');

Route::post('/posts/store','PostsController@store')->name('post.store');

Route::get('/posts/edit/{id}','PostsController@edit')->name('post.edit');

Route::post('/posts/update/{id}','PostsController@update')->name('post.update');

Route::get('/posts/delete/{id}','PostsController@destroy')->name('post.delete');

Route::get('/posts/trashed','PostsController@trashed')->name('post.trashed');

Route::get('/posts/restore/{id}','PostsController@restore')->name('post.restore');

Route::get('/posts/hdelete/{id}','PostsController@hdelete')->name('post.hdelete');

