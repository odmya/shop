<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tip extends Model
{
    //
    use Sluggable;
    protected $fillable = [
                    'title','slug','seo_title','seo_keyword','seo_description', 'description', 'displayed','category_id'
    ];
    public function tip_category()
    {
        return $this->belongsTo(TipCategory::class,'category_id');
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
