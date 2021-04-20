<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Route;

class Menu extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['submenu', 'aksesmenu', 'aksessubmenu'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama', 'kode', 'link', 'icon', 'status', 'tampil'
    ];

    public function submenu()
    {
        return $this->hasMany('App\Submenu');
    }

    public function aksesmenu()
    {
        return $this->hasMany('App\Aksesmenu');
    }

    public function aksessubmenu()
    {
        return $this->hasMany('App\Aksessubmenu');
    }

    public function checkAksesmenu($aksesgrup_id)
    {
        $aksesmenu = Aksesmenu::where('menu_id', $this->id)->where('aksesgrup_id', $aksesgrup_id);
        return $aksesmenu->first() ? true : null;
    }

    public function getAktifAttribute()
    {
        $current	=	explode(".", Route::currentRouteName());
        $submenu	=	Submenu::where('kode', $current[0])->where('menu_id', $this->id);
        return $submenu->first() === null ? '' : 'active open';
    }

    public function generate($menu, $submenu)
    {
        return [
                                'nama'      => $menu->nama,
                                'url'       => NULL,
                                'route'     => NULL,
                                'icon'      => 'fa '.$menu->icon,
                                'submenu'   => $submenu
                            ];
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(trim($value));
    }
}
