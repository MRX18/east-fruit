<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function images($count) {
    	return $this->orderByDesc('id')->paginate($count);
    }

    public function imageArticle($id) {
    	return $this->where('id', $id)->first();
    }
}
