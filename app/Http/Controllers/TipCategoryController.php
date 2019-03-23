<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipCategory;
use App\Models\Tip;


class TipCategoryController extends Controller
{
  public function show($slug){


    $tip_category = TipCategory::whereSlug($slug)->first();
    $tips = Tip::where('category_id',$tip_category->id)->where('displayed',1)->paginate(15);

  //  dd($tips);
    $page_title="";
    $curentpage = $tips->currentPage();
    if($curentpage>1){
      $page_title=" - Page ".$curentpage;
    }
    $seo_title = $tip_category->seo_title?$tip_category->seo_title:$tip_category->title;
    $seo_description = $tip_category->seo_description?$tip_category->seo_description:substr(strip_tags($tip_category->description),0,200);
    $canonical = route("tips.display",$slug);


    return view('tip_category.show', ['tips'=>$tips,'tip_category' => $tip_category,'tip_category'=>$tip_category, 'seo_title'=>$seo_title.$page_title,'seo_description'=>trim($seo_description.$page_title)]);

  }
}
