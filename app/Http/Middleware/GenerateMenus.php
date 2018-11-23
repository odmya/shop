<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {


         \Menu::make('TopNavBar', function ($menu) {
           $topnav = Menu::whereName('topNav')->first();
           $menu_topnav = $topnav->menu_item->where('parent',0);
           foreach($menu_topnav as $topnav){
             $menu->add($topnav->label,$topnav->link)->nickname(str_replace(" ","_",strtolower($topnav->label)));
             if($topnav->hasChildren()){
               foreach($topnav->hasChildren as $sub_menu_nav){
                 $menu->get(str_replace(" ","_",strtolower($topnav->label)))->add($sub_menu_nav->label,$sub_menu_nav->link);
               }
             }
           }


         });

         \Menu::make('footerNav', function ($menu) {
           $topnav = Menu::whereName('footerNav')->first();
           $menu_topnav = $topnav->menu_item->where('parent',0);
           foreach($menu_topnav as $topnav){
             $menu->add($topnav->label,$topnav->link)->nickname(str_replace(" ","_",strtolower($topnav->label)));
             if($topnav->hasChildren()){
               foreach($topnav->hasChildren as $sub_menu_nav){
                 $menu->get(str_replace(" ","_",strtolower($topnav->label)))->add($sub_menu_nav->label,$sub_menu_nav->link);
               }
             }
           }


         });


         return $next($request);
     }
}
