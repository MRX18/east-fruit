<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    public function program($id) {
    	return $this->where('id_training', $id)->get();
    }
}
