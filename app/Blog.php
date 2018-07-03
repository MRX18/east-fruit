<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Blog extends Model
{
    public function allArticlesBlog($count) {
    	return $this->where('visible', 1)->orderByDesc('id')->paginate($count);
    }

    public function oneArticleId($id) {
    	return $this->where('id', $id)->first();
    } 

    public function oneArticleSlug($slug) {
    	return $this->where('slug', $slug)->first();
    }

    public function sitebar($count) {
        $_controller = new Controller;

        $articles =  $this->orderByDesc('date')->limit($count)->get();

        return $_controller->dateSitebar($articles);
    }
}
