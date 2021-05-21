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
        $user			= \Auth::user();
        $current	=	explode(".", Route::currentRouteName());
        $submenu	=	Menu::where('kode', $current[0])->first();
        if($submenu !== NULL){
            if($submenu->tampil){
                $bolehakses = TRUE;
                if($submenu->perbaikan)
                {
                    $bolehakses = BolehAksesMenu::whereAksesgrupId(\Auth::user()->aksesgrup_id)->whereMenuId($submenu->id)->first() ?? FALSE;
                }
                if($bolehakses)
                {
                    $aksessub =  Aksesmenu::where('aksesgrup_id', $user->aksesgrup_id)->where('menu_id', $submenu->id);
                    if($aksessub->first()){
                        return $next($request);
                    }else{
                        return new Response(view('backend.home.error.403', ['submenu'=>$submenu]));
                    }
                } else {
                    return new Response(view('backend.home.error.503', ['submenu'=>$submenu]));
                }
            }else{
                return $next($request);
            }
        }else{
            new Response(view('backend.home.error.403'));
        }
    }
}
