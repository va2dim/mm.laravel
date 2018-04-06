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

Route::post('/posts', 'PostController@store');
Route::get('/categories/{category}/posts/create', 'PostController@update');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@update');
Route::get('/posts/{post}/delete', 'PostController@destroy');

Route::post('/categories', 'CategoryController@store');
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@update');
Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/categories/{category}/edit', 'CategoryController@update');
Route::get('/categories/{category}/delete', 'CategoryController@destroy');
