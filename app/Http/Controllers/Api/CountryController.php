<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\State;
use App\Transformers\CountryTransformer;
use App\Transformers\StateTransformer;
use App\Transformers\CityTransformer;

class CountryController extends Controller
{
    //
//得到所有国家例表
    public function list()
    {
      $country =Country::get();
        return $this->response->item($country, new CountryTransformer());
    }



    //根据国家country id 得到对应的states例表

    public function statelist($country)
    {

      $states =Country::find($country)->state;
      //$states =$country->state;
      return $this->response->item($states, new StateTransformer());
    }


//根据state id 得到对应的城市例表 city list
    public function citylist($state)
    {

      $cities =State::find($state)->city;
      //$states =$country->state;
      return $this->response->item($cities, new CityTransformer());
    }


}
