<?php

namespace App\Transformers;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
{
    public function transform(Country $country)
    {
        return [
            'id' => $country->id,
            'sortname' => $country->sortname,
            'name' => $country->name,
            'phonecode' => $country->phonecode,
        ];
    }
}
