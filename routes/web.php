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


Route::get('/', 'IndexController@index');


Route::get('/catigor/{id}', 'CatigorController@index')->where('id', '[0-9]+')->name('catigor');
Route::match(['get', 'post'],'/prices', 'CatigorController@prices')->name('price');
Route::get('/rating', 'CatigorController@rating');
Route::get('/all-articles', 'CatigorController@allArticle')->name('all-articles');
Route::get('/image', 'CatigorController@image')->name('images');

Route::match(['get', 'post'], '/blog', 'BlogController@index')->name('blog');
Route::match(['get', 'post'],'/blog/article/{id}', 'BlogController@article')->where('id', '[0-9]+')->name('articleBlog');
Route::match(['get','post'],'/addcommen/{id}', 'BlogController@addcomment')->where('id', '[0-9]+')->name('addcomment');
Route::match(['get', 'post'], '/add-blog', 'BlogController@addblog')->name('addblog');
Route::match(['get', 'post'], '/add-article-blog', 'BlogController@addartblog')->name('addartblog');


Route::match(['get', 'post'],'/article/{id}', 'ArticleController@index')->where('id', '[0-9]+')->name('article');

Route::get('/about', 'StaticController@about')->name('about');
Route::get('/cooperation', 'StaticController@cooperation')->name('cooperation');
Route::match(['get', 'post'],'/contact', 'StaticController@contact')->name('contact');
Route::get('/regulations', 'StaticController@regulations')->name('regulations');

Route::get('/events/{id}', 'CalendarController@index')->where('id','[0-9]+')->name('event');
Route::get('/conference/{id}', 'CalendarController@conference')->where('id','[0-9]+')->name('conference');
Route::get('/program/{id}', 'CalendarController@program')->where('id','[0-9]+')->name('program');
Route::get('/speakers/{id}', 'CalendarController@speakers')->where('id','[0-9]+')->name('speakers');

Route::get('/search/', 'SearchController@index')->name('search');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
