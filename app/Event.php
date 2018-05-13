<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Event extends Model
{
    public function allEvent($id, $count) {
    	$_controller = new Controller;

    	$event = $this->where('year', $id)->orderByDesc('id')->paginate($count);
    	return $_controller->dateCatigor($event);
    }

    public function onceEvent($id) {
        $_controller = new Controller;

    	$event = $this->where('id', $id)->first();
        $event->date = $_controller->dateFirst($event->date);

        return $event;
    }

    public function eventDаy($id, $count) {
    	$_controller = new Controller;

    	$event = $this->where('date', $id)->orderByDesc('id')->paginate($count);

    	return $_controller->dateCatigor($event);
    }
}
