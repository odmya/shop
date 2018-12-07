<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Information extends Model
{

  use Sluggable;
  protected $fillable = [
                  'title','sub_title','slug','seo_title','seo_keyword','seo_description', 'description', 'displayed'
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
