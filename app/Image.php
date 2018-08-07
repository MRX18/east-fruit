<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Image extends Model
{
    public function images($count) {
        $_controller = new Controller();

    	$iamges = $this->orderByDesc('id')->paginate($count);

        return $_controller->dateCatigor($iamges);
    }

    public function imageArticle($id) {
        $_controller = new Controller();

        $article = $this->where('id', $id)->first();
        $article->date = $_controller->dateFirst($article->date);

    	return $article;
    }
}
