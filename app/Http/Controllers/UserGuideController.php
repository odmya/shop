<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\UserGuide;


class UserGuideController extends Controller
{
    public function index(Request $request){

      $menuList = Menu::where('name','User Guide')->first();
      $menu_user_guide = $menuList->menu_item->where('parent',0);
      $guideitem = UserGuide::find(UserGuide::min('id'));


      return view('guide.index', ['guideitem' => $guideitem,'menu_user_guide' => $menu_user_guide]);

    }

    public function show($slug){

      $menuList = Menu::where('name','User Guide')->first();
      $menu_user_guide = $menuList->menu_item->where('parent',0);
      $guideitem = UserGuide::where('slug',$slug)->first();


      return view('guide.show', ['guideitem' => $guideitem,'menu_user_guide' => $menu_user_guide]);

    }
}
