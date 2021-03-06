<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\CatigorTop;
use App\Blog;
use App\Research;
use App\ResearchContent;
use App\Control;
use App\Image;
use App\Video;
use App\Event;

use Auth;


class Article extends Model
{
    use \KodiComponents\Support\Upload;

    protected $casts = [
        'pdf' => 'file', // or file | upload
    ];

    public function sitebar($count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

    	$articles =  $this->where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();
    	$blogs = Blog::where('visible', 1)->orderByDesc('created_at')->limit($count)->get();
    	$researchs = Research::where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();
        $images = Image::where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();
        $videos = Video::where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();
        $events = Event::orderByDesc('created_at')->limit($count)->get();


        $collection = array();
        foreach($articles as $value) {
            $value->slug = '/article/'.$value->slug;
            $value->catigor = CatigorTop::where('id', $value->id_catigories)->value('title');
//            $value->date = date("Y-m-d", strtotime($value->datetime));
            $collection[] = $value;
        }

        foreach($blogs as $value) {
            $value->slug = '/blog/article/'.$value->slug;
            $value->catigor = 'Блог';
            $value->datetime = $value->created_at;
            $collection[] = $value;
        }

        foreach($events as $value) {
            $value->slug = '/conference/'.$value->id;
            $value->date = date("Y-m-d", strtotime($value->created_at));
            $value->datetime = $value->created_at;
            $value->catigor = 'Календарь событий';
            $collection[] = $value;
        }

        foreach($images as $value) {
            $value->slug = '/image-article/'.$value->id;
            $value->catigor = 'Фотогалерея';
            $collection[] = $value;
        }

        foreach($videos as $value) {
            $value->slug = '/video-article/'.$value->slug;
            $value->catigor = 'Видео';
            $collection[] = $value;
        }

        foreach($researchs as $value) {
            if($value->size == 1) {
                $value->slug = '/great-research/'.$value->slug;
            } else {
                $value->slug = '/research/'.ResearchContent::where('id_research', $value->id)->orderBy('id')->value('slug');
            }
            $value->catigor = 'Исследования';
            $collection[] = $value;
        }

        $articles = collect($collection);

        $articles = $articles->sortByDesc('datetime')->take($count);

//        dd($articles);

        return $_controller->dateSitebar($articles);
    }

    public function articleInIndexPage($namePole, $data, $count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

    	$article = $this->where('datetime','<=',$date)->where($namePole, $data)->orderByDesc('datetime')->limit($count)->get();

        return $_controller->dateCatigor($article);
    }

    public function lineIndex($namePole, $data) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	$line = $this->where('datetime','<=',$date)->where($namePole,$data)->orderByDesc('datetime')->first();
        if(isset($line->date)) {
            $line->date = $_controller->dateFirst($line->date);
        }


        return $line;
    }
    /********Atricle page********/
    public function article($id) {
        $_controller = new Controller;

        // date_default_timezone_set('Europe/Kiev');
    	$article = $this->where('slug', $id)->first();
        $article->date = $_controller->dateFirst($article->date);
        return $article;
    }
    /********Catigor page********/
    public function articleCatigor($idCatigor, $count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

    	$article = $this->where('datetime','<=',$date)->where('id_catigories', $idCatigor)->orderByDesc('datetime')->paginate($count);

        return $_controller->dateCatigor($article);
    }
    public function allArticles($count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

    	$article = $this->where('datetime','<=',$date)->orderByDesc('datetime')->paginate($count);

        return $_controller->dateCatigor($article);
    }

    public function feedXml($count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

        $article = $this->where('datetime','<=',$date)->where('id_country', 5)->orderByDesc('datetime')->paginate($count);

        return $_controller->dateCatigor($article);
    }
    /*--------search-------*/
    public function search($search, $count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

        $article = $this->where('datetime','<=',$date)->where('title', 'LIKE', '%'.$search.'%')->orderByDesc('datetime')->paginate($count);

        return $_controller->dateCatigor($article);
    }
    /*admin*/
    public function setSlugAttribute($value)
    {
        if (!$this->exists) {

            if(Auth::check()) {
                Control::insert(
                    ['id_user' => Auth::user()->id]
                );
            }

            return $this->attributes['slug'] = str_slug($this->attributes['title']);
        } 
        return $this->attributes['slug'] = $value;
    }
}
