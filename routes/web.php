<?php
use App\Article;
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


Route::get('/catigor/{id}', 'CatigorController@index')->name('catigor');

Route::get('/research', 'ResearchController@index')->name('research');
Route::get('/great-research/{id}', 'ResearchController@greatResearch')->name('great-research');
Route::get('/research/{id}', 'ResearchController@research')->name('min-research');



Route::get('/prices', 'CatigorController@prices')->name('price');
Route::post('/price-ajax', 'CatigorController@priceAjax');

Route::post('/specification', 'CatigorController@specification')->name('specification');
// Route::get('/specification/{id}', 'CatigorController@specification')->name('specification');
// Route::get('/rating', 'CatigorController@rating');
Route::get('/all-articles', 'CatigorController@allArticle')->name('all-articles');
Route::get('/image', 'CatigorController@image')->name('images');
Route::get('/image-article/{id}', 'CatigorController@imageArticle')->where('id', '[0-9]+')->name('image-article');

Route::match(['get', 'post'], '/blog', 'BlogController@index')->name('blog');
Route::match(['get', 'post'],'/blog/article/{id}', 'BlogController@article')->name('articleBlog');
Route::match(['get','post'],'/addcommen/{id}', 'BlogController@addcomment')->where('id', '[0-9]+')->name('addcomment');
Route::match(['get', 'post'], '/add-blog', 'BlogController@addblog')->name('addblog');
Route::match(['get', 'post'], '/add-article-blog', 'BlogController@addartblog')->name('addartblog');


Route::match(['get', 'post'],'/article/{id}', 'ArticleController@index')->name('article');

Route::get('/about', 'StaticController@about')->name('about');
Route::get('/cooperation', 'StaticController@cooperation')->name('cooperation');
Route::match(['get', 'post'],'/contact', 'StaticController@contact')->name('contact');
Route::get('/regulations', 'StaticController@regulations')->name('regulations');

Route::get('/events/{id}', 'CalendarController@index')->where('id','[0-9]+')->name('event');
Route::get('/event-catigor/{id}', 'CalendarController@eventCatigor')->name('event-catigor');
Route::get('/event-day/{id}', 'CalendarController@eventDay')->name('eventDay');
Route::get('/conference/{id}', 'CalendarController@conference')->where('id','[0-9]+')->name('conference');
Route::get('/program/{id}', 'CalendarController@program')->where('id','[0-9]+')->name('program');
Route::get('/speakers/{id}', 'CalendarController@speakers')->where('id','[0-9]+')->name('speakers');
Route::get('/media-report/{id}', 'CalendarController@mediaReport')->where('id','[0-9]+')->name('media-report');
Route::get('/conference-materials/{id}', 'CalendarController@conferenceMaterials')->where('id','[0-9]+')->name('conference-materials');


Route::get('/search/', 'SearchController@index')->name('search');

Route::match(['get', 'post'], '/question', 'IndexController@question')->name('question');
Route::get('/vote/{id}', 'IndexController@answer')->where('id', '[0-9]+')->name('answer');


Route::get('/study-trips', 'TrainingController@index')->name('study');
Route::get('/training-event/{id}', 'TrainingController@event')->where('id','[0-9]+')->name('training-event');
Route::get('/training-map/{id}', 'TrainingController@map')->where('id','[0-9]+')->name('training-map');
Route::get('/training-organizer/{id}', 'TrainingController@organizer')->where('id','[0-9]+')->name('training-organizer');
Route::get('/training-program/{id}', 'TrainingController@program')->where('id','[0-9]+')->name('training-program');

Route::post('ulogin', 'UloginController@login');


Auth::routes();

Route::get('/home', 'IndexController@index')->name('home');
Route::match(['get', 'post'], '/register', 'RegisterController@register')->name('register');
Route::match(['get', 'post'], '/registration', 'RegisterController@register')->name('registration');
Route::match(['get', 'post'], '/email', 'RegisterController@email')->name('email');

Route::match(['get', 'post'], '/password/restoring', 'RegisterController@restoring')->name('password-restoring');
Route::match(['get', 'post'], '/password/restoring/{hash}', 'RegisterController@restoringLink')->name('restoring-link');


Route::get('/video', 'CatigorController@video')->name('video');
Route::get('/video-article/{id}', 'CatigorController@videoArticle')->name('video-article');

Route::match(['get', 'post'], '/excel', 'ExcelController@exportExcel')->name('exportExcel');

Route::get('/delete-comment/{id}', 'ArticleController@deleteComment')->where('id','[0-9]+')->name('delete-comment');
Route::get('/delete-blog-comment/{id}', 'BlogController@deleteComment')->where('id','[0-9]+')->name('delete-blog-comment');

Route::get('/rss_other', "XMLController@RssOther");

Route::get('/other_rss.php', function() {
	$_article = new Article;
    $articles = $_article->sitebar(20);

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('rss');
    $xml->writeAttribute('version', "2.0");
    	$xml->startElement('channel');
    		$xml->startElement('title');
    			$xml->text("East Fruit Новости");
    		$xml->endElement();
    		$xml->startElement('link');
    			$xml->text("https://east-fruit.com/");
    		$xml->endElement();
    		$xml->startElement('description');
    			$xml->text("Информация о рынках овощей и фруктов на восток от Евросоюза");
    		$xml->endElement();
    		$xml->startElement('language');
    			$xml->text("ru-ru");
    		$xml->endElement();
		    foreach($articles as $article) {
		        $xml->startElement('item');
		        	$xml->startElement('title');
		        		$xml->text($article->title);
		        	$xml->endElement();
		        	$xml->startElement('link');
		        		$xml->text("https://east-fruit.com".$article->slug);
		        	$xml->endElement();
		        	$xml->startElement('description');
		        		$xml->text("<![CDATA[".$article->lid."]]");
		        	$xml->endElement();
		        	$xml->startElement('pubDate');
		        		$xml->text(date("r",strtotime($article->datetime)));
		        	$xml->endElement();
		        $xml->endElement();
		    }
    	$xml->endElement();
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});

Route::get('/feed_rss.php', function() {
	$_article = new Article;
    $articles = $_article->feedXml(20);

    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('rss');
    $xml->writeAttribute('version', "2.0");
    $xml->writeAttribute('xmlns:yandex', "http://news.yandex.ru");
    	$xml->startElement('channel');
    		$xml->startElement('title');
    			$xml->text("East Fruit Новости");
    		$xml->endElement();
    		$xml->startElement('link');
    			$xml->text("https://east-fruit.com/");
    		$xml->endElement();
    		$xml->startElement('description');
    			$xml->text("Информация о рынках овощей и фруктов на восток от Евросоюза");
    		$xml->endElement();
    		$xml->startElement('language');
    			$xml->text("ru-ru");
    		$xml->endElement();
		    foreach($articles as $article) {
		        $xml->startElement('item');
		        	$xml->startElement('title');
		        		$xml->text($article->title);
		        	$xml->endElement();
		        	$xml->startElement('link');
		        		$xml->text("https://east-fruit.com/article/".$article->slug);
		        	$xml->endElement();
		        	$xml->startElement('description');
		        		$xml->text("<![CDATA[".$article->lid."]]");
		        	$xml->endElement();
		        	$xml->startElement('category');
		        		$xml->text("Экономика");
		        	$xml->endElement();
		        	$xml->startElement('enclosure');
		        		$xml->writeAttribute('url', "https://east-fruit.com/".$article->img);
		        		$xml->writeAttribute('type', "image/jpeg");
		        	$xml->endElement();
		        	$xml->startElement('pubDate');
		        		$xml->text(date("r",strtotime($article->datetime)));
		        	$xml->endElement();
		        	$xml->startElement('yandex:full-text');
		        		$xml->text(strip_tags($article->text));
		        	$xml->endElement();
		        $xml->endElement();
		    }
    	$xml->endElement();
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
});

//Route::match(['get', 'post'], '/excel', 'ExcelController@uploadExsel')->name('excel');

// Route::get('/slug', function() {
// 	$art = App\Article::get();
// 	foreach($art as $value) {
// 		$newOb = App\Article::find($value->id);

// 		$newOb->slug = str_slug($value->title);
// 		$newOb->save();
// 	}
// });
// Route::get('/slug', function() {
// 		$art = Article::get();

// 		foreach($art as $value) {
// 		Article::where('id', $value->id)
//             ->update(array('pdf' => NULL));
//         }
// });
