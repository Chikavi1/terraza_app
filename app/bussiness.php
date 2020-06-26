<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bussiness extends Model
{
  protected $fillable = [
        'name','image','price','description','services','direction','category','latitude','longitude','phone','peopleLimit','city','schedule','user_id'
    ];


    public function services()
    {
        return $this->hasMany('App\Services');
    }
    public function reservations()
    {
        return $this->hasMany('App\reservation');
    }
    public function reviews()
    {
        return $this->hasMany('App\review');
    }
     public function ImagesBussinesses()
    {
        return $this->hasMany('App\ImagesBussiness');
    }

  public function scopePlace($query,$city){
    if($city){
      return $query->where('city','LIKE',"%$city%");
    }
  }
   public function scopeServices($query,$services){
    if($services){
      return $query->where('services','LIKE',"%$services%");
    }
  }
  public function scopeMinimum($query,$minimum){
    if($minimum){
      return $query->Where('price','>=',$minimum);
    }
  }
  public function scopeMaximum($query,$maximum){
    if($maximum){
      return $query->Where('price','<=',$maximum);
    }
  }
 



}
