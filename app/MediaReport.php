<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaReport extends Model
{
    public function mediaReport($id) {
    	return $this->where('id_event', $id)->get();
    }
}
