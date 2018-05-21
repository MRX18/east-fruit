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
Route::get('/event-day/{id}', 'CalendarController@eventDay')->name('eventDay');
Route::get('/conference/{id}', 'CalendarController@conference')->where('id','[0-9]+')->name('conference');
Route::get('/program/{id}', 'CalendarController@program')->where('id','[0-9]+')->name('program');
Route::get('/speakers/{id}', 'CalendarController@speakers')->where('id','[0-9]+')->name('speakers');

Route::get('/search/', 'SearchController@index')->name('search');

Route::match(['get', 'post'], '/question', 'IndexController@question')->name('question');


Route::get('/study-trips', 'TrainingController@index')->name('study');
Route::get('/training-event/{id}', 'TrainingController@event')->where('id','[0-9]+')->name('training-event');
Route::get('/training-map/{id}', 'TrainingController@map')->where('id','[0-9]+')->name('training-map');
Route::get('/training-organizer/{id}', 'TrainingController@organizer')->where('id','[0-9]+')->name('training-organizer');
Route::get('/training-program/{id}', 'TrainingController@program')->where('id','[0-9]+')->name('training-program');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/slug', function() {
	$art = App\Article::get();
	foreach($art as $value) {
		$newOb = App\Article::find($value->id);

		$newOb->slug = str_slug($value->title);
		$newOb->save();
	}
});
