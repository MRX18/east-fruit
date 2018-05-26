<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function programs($id) {
    	return $this->where('id_event', $id)->get();
    }
}
