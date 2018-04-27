<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{

    public function sitebar($count) {
        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();
    }

    public function articleInIndexPage($namePole, $data, $count) {
        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where($namePole, $data)->orderByDesc('datetime')->limit($count)->get();
    }

    public function lineIndex($namePole, $data) {
        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where($namePole,$data)->orderByDesc('datetime')->first();
    }
    /********Atricle page********/
    public function article($id) {
        date_default_timezone_set('Europe/Kiev');
    	return $this->where('id', $id)->first();
    }
    /********Catigor page********/
    public function articleCatigor($idCatigor, $count) {
        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where('id_catigories', $idCatigor)->orderByDesc('datetime')->paginate($count);
    }
    public function allArticles($count) {
        date_default_timezone_set('Europe/Kiev');
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->orderByDesc('datetime')->paginate($count);
    }
}
