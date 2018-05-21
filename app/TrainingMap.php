<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingMap extends Model
{
    public function map($id) {
    	return $this->where('id_training', $id)->first();
    }
}
