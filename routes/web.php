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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', 'HomeController@home')->name('home');

Route::get('/post/create', 'PostController@createPost')-> name('post.create');
Route::post('/post/store', 'PostController@storePost')-> name('post.store');

Route::get('/post/edit/{id}', 'PostController@edit')-> name('post.edit');
Route::post('/post/update{id}', 'PostController@update')-> name('post.update');

// Route::post('/post/delete/{id}', 'PostController@delete')-> name('post.delete');

Route::post('/register','Auth\RegisterController@register')->name('register');

Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/logout','Auth\LoginController@logout')->name('logout');





