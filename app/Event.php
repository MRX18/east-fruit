<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function allEvent($id, $count) {
    	return $this->where('year', $id)->orderByDesc('id')->paginate($count);
    }

    public function onceEvent($id) {
    	return $this->where('id', $id)->first();
    }
}
