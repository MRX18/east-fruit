<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public function speacers($id) {
    	return $this->where('id', $id)->get();
    }
}
