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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');
Route::get('/catigor/{id}', 'CatigorController@index')->where('id', '[0-9]+')->name('catigor');
Route::get('/catigors/{id}', 'CatigorController@otherCatigor')->where('id', '[a-z]+')->name('otherCatigor');
Route::get('/article/{id}', 'ArticleController@index')->where('id', '[0-9]+')->name('article');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
