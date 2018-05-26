<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    public function conference($id) {
    	return $this->where('id_event', $id)->first();
    }

    public function conferenceRelation() 
    {
    	return $this->belongsTo(Event::class, 'id_event', 'id');
    }
}
