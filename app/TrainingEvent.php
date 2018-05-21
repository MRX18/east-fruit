<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingEvent extends Model
{
    public function event($id) {
    	return $this->where('id_training', $id)->first();
    }
}
