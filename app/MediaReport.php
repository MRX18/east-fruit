<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaReport extends Model
{
    public function mediaReport($id) {
    	return $this->where('id_event', $id)->get();
    }

    public function MediaReportRelation() 
    {
    	return $this->belongsTo(Event::class, 'id_event', 'id');
    }
}
