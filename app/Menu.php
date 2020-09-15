<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
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

    public function active($kode)
    {
        $current	=	explode("/", $kode);
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
