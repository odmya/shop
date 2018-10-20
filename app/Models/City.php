<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public function State()
  {
      return $this->belongsTo(State::class);
  }
}
