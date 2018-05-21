<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingOrganizer extends Model
{
    public function organizer($id) {
    	return $this->where('id_training', $id)->get();
    }
}
