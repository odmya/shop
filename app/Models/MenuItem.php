<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
  protected $fillable = [
                  'label','link','parent','sort','class', 'icon', 'menu_id', 'depth'
  ];

  public function menu()
  {
      return $this->belongsTo(Menu::class);
  }

  public function hasChildren(){
    return $this->hasMany(self::class, "parent");
  }
}
