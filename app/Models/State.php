<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  public function city()
 {
     return $this->hasMany(City::class);
 }
 public function country()
 {
     return $this->belongsTo(Country::class);
 }

}
