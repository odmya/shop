<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class UserGuide extends Model
{
  use Sluggable;
  protected $fillable = [
                  'title','slug','seo_title','seo_keyword','seo_description', 'description', 'prev_item', 'next_item','sort'
  ];

  public function sluggable()
  {

      return [
          'slug' => [
              'source' => 'title'
          ]
      ];
  }

  public function previtem()
  {
      return $this->belongsTo(self::class, "prev_item");
  }


  public function nextitem()
  {
      return $this->belongsTo(self::class, "next_item");
  }



}
