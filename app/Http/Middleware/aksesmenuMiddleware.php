<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use App\Menu;
use App\Aksesmenu;
use Illuminate\Http\Response;
use App\BolehAksesMenu;

class aksesmenuMiddleware
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
        $user	    = \Auth::user();
        $current	=	explode(".", Route::currentRouteName());
        $menu	    =	Menu::where('kode', $current[0])->first();
        if($menu !== NULL){
            if($menu->private){
                $bolehakses = TRUE;
                if($menu->perbaikan)
                {
                    $bolehakses = BolehAksesMenu::whereAksesgrupId(\Auth::user()->aksesgrup_id)->whereMenuId($menu->id)->first() ?? FALSE;
                }
                if($bolehakses)
                {
                    $aksessub =  Aksesmenu::where('aksesgrup_id', $user->aksesgrup_id)->where('menu_id', $menu->id);
                    if($aksessub->first()){
                        return $next($request);
                    }else{
                        return new Response(view('backend.home.error.403', ['submenu'=>$menu]));
                    }
                } else {
                    return new Response(view('backend.home.error.503', ['submenu'=>$menu]));
                }
            }else{
                return $next($request);
            }
        }else{
            new Response(view('backend.home.error.403'));
        }
    }
}
