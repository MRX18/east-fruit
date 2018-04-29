<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yaer extends Model
{
	public function years() {
		return $this->orderByDesc('year')->get();
	}
}
