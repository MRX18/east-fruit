<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class Article extends Model
{

    public function sitebar($count) {
        $_controller = new Controller;

        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();

    	$articles =  $this->where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();

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
        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where($namePole,$data)->orderByDesc('datetime')->first();
    }
    /********Atricle page********/
    public function article($id) {
        $_controller = new Controller;

        // date_default_timezone_set('Europe/Kiev');
    	$article = $this->where('id', $id)->first();
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
}
