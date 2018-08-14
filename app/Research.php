<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class Research extends Model
{
    public function setSlugAttribute($value)
    {
        if (!$this->exists) {
            return $this->attributes['slug'] = str_slug($this->attributes['title']);
        } 
        return $this->attributes['slug'] = $value;
    }

    public function allResearch($count) {
        $_controller = new Controller;

        $date = Carbon::now()->toDateTimeString();

    	$research = $this->where('datetime','<=',$date)->orderByDesc('datetime')->paginate($count);

    	return $_controller->dateCatigor($research);
    }

    public function research($id) {
    	$_controller = new Controller;

    	$research = $this->where('slug', $id)->first();
    	$research->date = $_controller->dateFirst($research->date);

    	return $research;
    }

    public function researchArticle($id) {
    	$_controller = new Controller;

    	$research = $this->where('id', $id)->first();
    	$research->date = $_controller->dateFirst($research->date);

    	return $research;
    }
}
