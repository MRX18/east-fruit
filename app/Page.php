<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function pageContent($slug) {
        return $this->where('slug', $slug)->first();
    }
}
