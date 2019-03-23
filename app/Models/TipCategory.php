<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TipCategory extends Model
{

  use Sluggable;
  protected $fillable = [
                  'title','slug','seo_title','seo_keyword','seo_description', 'description', 'displayed'
  ];


  public function tip()
  {
      return $this->hasMany(Tip::class,'category_id');
  }


  public function sluggable()
  {

      return [
          'slug' => [
              'source' => 'title'
          ]
      ];
  }


}
