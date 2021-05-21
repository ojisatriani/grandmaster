<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Route;

class Menu extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['aksesmenu'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama', 'kode', 'link', 'icon', 'tampilkan', 'private', 'parent_id', 'perbaikan', 'pengumuman'
    ];

    public function child() // One level child
    {
        return $this->hasMany('App\Menu', 'parent_id');
    }

    public function children() // Recursive children
    {
        return $this->child()->with('children');
    }

    public function parent() // One level parent
    {
        return $this->belongsTo('App\Menu', 'parent_id');
    }

    public function parents() // Recursive parents
    {
        return $this->parent()->with('parents');
    }

    public function aksesmenu()
    {
        return $this->hasMany('App\Aksesmenu');
    }

    public function checkAksesmenu($aksesgrup_id)
    {
        $aksesmenu = Aksesmenu::where('menu_id', $this->id)->where('aksesgrup_id', $aksesgrup_id);
        return $aksesmenu->first() ? true : null;
    }

    public function getAktifAttribute()
    {
        // $submenu	=	Menu::where('kode', $current[0])->whereId($this->id);
        // return $submenu->first() === null ? '' : 'active open';
        return '';
    }

    public function getUrlAttribute()
    {
        $url = url(ltrim(config('master.url.admin').'/'.$this->link, '/'));
        return $this->punya_sub ? '#'.$this->link:$url;
    }

    public function getPunyaSubAttribute()
    {
        $sub = Menu::whereParentId($this->id)->whereTampilkan(1)->first();
        if($this->child->count() > 0 && $sub !== NULL)
        {
            return TRUE;
        } else {
            return FALSE;
        }
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
