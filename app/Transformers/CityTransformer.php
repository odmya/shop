<?php

namespace App\Transformers;

use App\Models\City;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    public function transform(City $city)
    {
        return [
            'id' => $city->id,
            'name' => $city->name,
        ];
    }
}
