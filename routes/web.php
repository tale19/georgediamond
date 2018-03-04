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
Route::get('/admin', 'HomeController@index')->name('admin.index');
Route::get('/admin/shows', 'HomeController@shows')->name('admin.shows');
Route::get('/admin/news', 'HomeController@posts')->name('admin.posts');

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/shows', 'PagesController@shows');
Route::get('/contact', 'PagesController@contact');

Route::get('/news', 'PostsController@index');
Route::post('/news', 'PostsController@store');
Route::get('/news/create', 'PostsController@create');
Route::get('/news/{post}', 'PostsController@show');
Route::patch('/news/{post}', 'PostsController@update');
Route::delete('/news/{post}', 'PostsController@destroy');
Route::get('/news/{post}/edit', 'PostsController@edit');
Route::get('/search', 'PostsController@search');

Route::get('/shows', 'ShowsController@index');