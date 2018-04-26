<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function sitebar($count) {
    	return $this->orderByDesc('id')->limit($count)->get();
    }

    public function articleInIndexPage($namePole, $data, $count) {
    	return $this->where($namePole, $data)->orderByDesc('id')->limit($count)->get();
    }

    public function lineIndex($namePole, $data) {
    	return $this->where($namePole,$data)->orderByDesc('id')->first();
    }
    /********Atricle page********/
    public function article($id) {
    	return $this->where('id', $id)->first();
    }
    /********Catigor page********/
    public function articleCatigor($idCatigor, $count) {
    	return $this->where('id_catigories', $idCatigor)->orderByDesc('id')->paginate($count);
    }
    public function allArticles($count) {
    	return $this->orderByDesc('id')->paginate($count);
    }
}
