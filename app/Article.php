<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{

    public function sitebar($count) {
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->orderByDesc('datetime')->limit($count)->get();
    }

    public function articleInIndexPage($namePole, $data, $count) {
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where($namePole, $data)->orderByDesc('datetime')->limit($count)->get();
    }

    public function lineIndex($namePole, $data) {
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where($namePole,$data)->orderByDesc('datetime')->first();
    }
    /********Atricle page********/
    public function article($id) {
    	return $this->where('id', $id)->first();
    }
    /********Catigor page********/
    public function articleCatigor($idCatigor, $count) {
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->where('id_catigories', $idCatigor)->orderByDesc('datetime')->paginate($count);
    }
    public function allArticles($count) {
        $date = Carbon::now()->toDateTimeString();
    	return $this->where('datetime','<=',$date)->orderByDesc('datetime')->paginate($count);
    }
}
