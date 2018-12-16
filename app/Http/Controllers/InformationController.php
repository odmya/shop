<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{

  public function show($slug){


    $information = Information::whereSlug($slug)->first();
    $seo_title = $information->seo_title?$information->seo_title:$information->title;
    $seo_description = $information->seo_description?$information->seo_description:substr(strip_tags($information->description),0,200);

    return view('information.show', ['information' => $information, 'seo_title'=>$seo_title,'seo_description'=>trim($seo_description)]);

  }

}
