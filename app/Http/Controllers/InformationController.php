<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{

  public function show($slug){


    $information = Information::whereSlug($slug)->first();


    return view('information.show', ['information' => $information]);

  }

}
