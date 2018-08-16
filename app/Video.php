<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Video extends Model
{
    use \KodiComponents\Support\Upload;

    protected $casts = [
        'video' => 'file', // or file | upload
        'pdf' => 'file',
    ];

    public function setSlugAttribute($value)
    {
        if (!$this->exists) {
            return $this->attributes['slug'] = str_slug($this->attributes['title']);
        }
        return $this->attributes['slug'] = $value;
    }

    public function article($slug) {
        return $this->where('slug', $slug)->first();
    }
}
