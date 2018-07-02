<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    public function hours($id) {
        return $this->where('id_user', $id)->get();
    }
}
