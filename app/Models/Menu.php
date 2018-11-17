<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $fillable = [
                  'name'
  ];

  public function menu_item()
  {
      return $this->hasMany(MenuItem::class);
  }

}
