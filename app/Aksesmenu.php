<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aksesmenu extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id', 'aksesgrup_id'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function aksesgrup()
    {
        return $this->belongsTo('App\Aksesgrup');
    }

    public function scopeGabungMenu($query, $id)
    {
        return $query->rightJoin('menus','aksesmenus.menu_id', '=','menus.id')
        ->whereNull('menus.parent_id')
        ->where('aksesmenus.aksesgrup_id', $id)
        ->select('aksesmenus.*', 'menus.nama');
    }
}
