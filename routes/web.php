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

Route::get('/', 'ProductController@index')->name('welcome');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::any('/search', 'ProductController@search');
