<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public function specification($id) {
    	return $this->where('id_product', $id)->get();
    }
}
