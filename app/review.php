<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
     public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
