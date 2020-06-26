<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
  protected $fillable = [
      'bussiness_id', 'user_id', 'price','day','status','description','invoice'
  ];
}
