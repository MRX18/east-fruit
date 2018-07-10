<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchContent extends Model
{
    use \KodiComponents\Support\Upload;

    protected $casts = [
        'pdf' => 'file', // or file | upload
    ];

    public function allResearchContent($id) {
    	return $this->where('id_research', $id)->get();
    }

    public function onceResearchContent($id) {
    	return $this->where('slug', $id)->first();
    }

    public function setSlugAttribute($value)
    {
        if (!$this->exists) {
            return $this->attributes['slug'] = str_slug($this->attributes['title']);
        }
        return $this->attributes['slug'] = $value;
    }
}
