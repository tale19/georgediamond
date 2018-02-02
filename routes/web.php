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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/shows', 'PagesController@shows');
Route::get('/contact', 'PagesController@contact');

Route::get('/news', 'PostsController@index');
Route::get('/news/{post}', 'PostsController@show');
Route::get('/search', 'PostsController@search');

Route::get('/shows', 'ShowsController@index');