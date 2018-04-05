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
//Route::setRoutes(new Illuminate\Routing\RouteCollection);


//Route::resource('/posts', 'PostController');

//Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');

Route::get('/posts/create', 'PostController@update');
Route::get('/posts/{post}', 'PostController@show'); // Post info + comments on it
Route::get('/posts/{post}/edit', 'PostController@update');

/*
Route::resource('categories', 'CategoryController', ['except' => [
    'destroy'
]]);
*/

Route::post('categories', 'CategoryController@store');
Route::get('categories', 'CategoryController@index'); // Category posts list

Route::get('categories/create', 'CategoryController@update');
Route::get('categories/{category}', 'CategoryController@show'); // Category posts list + comments on Category
Route::get('categories/{category}/edit', 'CategoryController@update');
