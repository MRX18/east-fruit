<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceMaterial extends Model
{
	use \KodiComponents\Support\Upload;
	
    protected $casts = [
        'pdf' => 'file', // or file | upload
    ];

    public function conferenceMaterial($id) {
    	return $this->where('id_event', $id)->get();
    }
}
