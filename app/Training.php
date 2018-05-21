<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Training extends Model
{
    public function allTraning($count) {
    	$_controller = new Controller;

    	$training = $this->orderByDesc('date')->paginate($count);
    	return $_controller->dateCatigor($training);
    }

    public function onceTraining($id) {
    	$_controller = new Controller;

    	$training = $this->where('id', $id)->first();
    	$training->date = $_controller->dateFirst($training->date);

    	return $training;
    }
}
