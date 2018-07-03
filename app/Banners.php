<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    public function index() {
        return $this->orderByDesc('id')->first();
    }
}
