<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    public function conference($id) {
    	return $this->where('id', $id)->first();
    }
}
