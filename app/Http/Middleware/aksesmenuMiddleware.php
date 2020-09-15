<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use App\Submenu;
use App\Aksessubmenu;

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
        $submenu	=	Submenu::where('kode', $current[0])->first();
        if($submenu !== NULL){
            // foreach($submenu as $smn){
                if($submenu->tampil){
                    $aksessub =  Aksessubmenu::where('aksesgrup_id', $user->aksesgrup_id)->where('submenu_id', $submenu->id);
                    if($aksessub->first()){
                        return $next($request);
                    }else{
                        return redirect(config('master.url.admin'));
                    }
                }else{
                    return $next($request);
                }
        }else{
            return redirect(config('master.url.admin'));
        }
    }
}
