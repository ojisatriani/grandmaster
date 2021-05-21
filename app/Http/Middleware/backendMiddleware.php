<?php

namespace App\Http\Middleware;

use Closure;
use OjiSatriani\Fungsi;
use View;
use App\Menu;
use App\Submenu;

class backendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $fungsi;
    protected $tanggal;

    public function handle($request, Closure $next)
    {
        
        $menus              = Menu::whereTampilkan(true)->whereNull('parent_id')->latest()->get();
        $current	        = explode(".", \Route::currentRouteName());
        $menu               = Menu::whereKode($current[0])->latest()->first();
        $halaman            = $menu === null ? null:$menu;
        $this->fungsi       = new Fungsi;
        $this->tanggal      = Fungsi::setTanggal();
        View::share([
            'menu_item'     => $menus,
            'fungsi'        => $this->fungsi,
            'tanggal'       => $this->tanggal,
            'halaman'       => $halaman,
            'url_admin'     => config('master.url.admin'),
        ]);
        return $next($request);
    }
}
