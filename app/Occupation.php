<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    public function allOccupation() {
    	return $this->get();
    }
}
