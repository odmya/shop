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
  
}
