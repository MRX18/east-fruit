<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function answer($idQuestion) {
    	return $this->where('id_questions', $idQuestion)->get();
    }
}
