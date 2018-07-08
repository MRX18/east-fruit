<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Video extends Model
{
    public function setSlugAttribute($value)
    {
        if (!$this->exists) {
            return $this->attributes['slug'] = str_slug($this->attributes['title']);
        }
        return $this->attributes['slug'] = $value;
    }

    public function video($count) {
        $_controller = new Controller();

        $video = $this->orderByDesc('date')->paginate($count);

        return $_controller->dateCatigor($video);
    }

    public function article($slug) {
        return $this->where('slug', $slug)->first();
    }
}
