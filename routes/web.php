<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostsController@index');
Route::get('/posts/show/{post_id}', 'PostsController@show');
Route::get('/posts/create', 'PostsController@create');
Route::post('/post/store', 'PostsController@store');
Route::get('/post/user_posts', 'PostsController@user_posts');
Route::get('/post/delete/{id}', 'PostsController@delete');
Route::get('/post/edit/{post}', 'PostsController@edit');
Route::post('/post/update/{post}', 'PostsController@update');

Route::post('/filter', 'FilterController@index');

Auth::routes();

Route::get('/home', 'PostsController@index')->name('home');
