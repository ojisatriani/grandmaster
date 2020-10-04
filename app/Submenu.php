<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
        'nama', 'kode', 'link', 'icon', 'status', 'tampil','menu_id','perbaikan'
    ];

    protected $casts = [
        'tampil' => 'boolean',
        'status' => 'boolean',
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function aksessubmenu()
    {
        return $this->hasMany('App\Aksessubmenu');
    }

    public function boleh_akses_submenu()
    {
        return $this->hasMany('App\BolehAksesSubmenu');
    }

    public function checkAksessubmenu($aksesgrup_id)
    {
        $aksessubmenu = Aksessubmenu::where('submenu_id', '=', $this->id)->where('aksesgrup_id', '=', $aksesgrup_id);
        return $aksessubmenu->first() ? true : null;
    }

    public function akses_grup($submenu_id)
    {
        $akses = Aksessubmenu::where('submenu_id', $submenu_id)->where('aksesgrup_id', \Auth::user()->aksesgrup_id)->first();
        return $akses === null ? false:true;
    }

    public function active($kode)
    {
        $current	=	explode("/", $kode);
        return $this->kode == $current[0] ? 'active' : null;
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(trim($value));
    }

    public function generate($sub, $url_admin)
    {
        return [
                'nama'      => $sub->nama,
                'url'       => url(ltrim($url_admin.'/'.$sub->link, '/')),
                'route'     => ltrim($url_admin.'/'.$sub->link, '/'),
                'icon'      => 'fa '.$sub->icon,
            ];
    }
}