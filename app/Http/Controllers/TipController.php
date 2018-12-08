<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tip;


class TipController extends Controller
{

  public function show($category_slug,$slug){


    $tip = Tip::whereSlug($slug)->first();
    $prevtip_id=$this->getPrevTipId($tip->id);
    $nexttip ="";
    $prevtip ="";
    if($prevtip_id){
      $prevtip = Tip::find($prevtip_id);
    }

    $nexttip_id=$this->getNextTipId($tip->id);

    if($nexttip_id){
      $nexttip = Tip::find($nexttip_id);
    }



    return view('tip.show', ['tip' => $tip,'prevtip'=>$prevtip,'nexttip'=>$nexttip]);

  }


  protected function getPrevTipId($id)
  {
    return Tip::where('id', '<', $id)->max('id');
  }


  protected function getNextTipId($id)
  {
    return Tip::where('id', '>', $id)->min('id');
  }


}
