<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aksesgrup extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['aksesmenu', 'aksessubmenu'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama', 'alias'
    ];
    
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function aksesmenu()
    {
        return $this->hasMany('App\Aksesmenu');
    }

    public function aksessubmenu()
    {
        return $this->hasMany('App\Aksessubmenu');
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(trim($value));
    }

    public function generateUser($uid)
    {
        $grup       = Aksesgrup::firstOrCreate(['alias'=>'user'], array('nama' => 'User'));
        $idgrup = $grup->id;
        
        //generate aksesmenu
        $menus    = Menu::whereIn('kode', config('master.aksesgrup.user.menu'))->get();
        foreach ($menus as $menu) {
            Aksesmenu::firstOrCreate(['menu_id'=>$menu->id,'aksesgrup_id'=>$idgrup]);
        }

        //generate aksessubmenu
        $submenus    = Submenu::whereIn('kode', config('master.aksesgrup.user.submenu'))->get();
        foreach ($submenus as $submenu) {
            Aksessubmenu::firstOrCreate(['submenu_id'=>$submenu->id,'aksesgrup_id'=>$idgrup]);
        }
        return User::find($uid)->update(['aksesgrup_id' => $idgrup]);
    }

    public function generateAdmin($uid)
    {
        $grup = Aksesgrup::firstOrCreate(['alias'=>'admin'], array('nama' => 'Admin'));
        $idgrup = $grup->id;
        
        
        //generate aksesmenu
        $menus    = Menu::whereIn('kode', config('master.aksesgrup.admin.menu'))->get();
        foreach ($menus as $menu) {
            Aksesmenu::firstOrCreate(['menu_id'=>$menu->id,'aksesgrup_id'=>$idgrup]);
        }

        //generate aksessubmenu
        $submenus    = Submenu::whereIn('kode', config('master.aksesgrup.admin.submenu'))->get();
        foreach ($submenus as $submenu) {
            Aksessubmenu::firstOrCreate(['submenu_id'=>$submenu->id,'aksesgrup_id'=>$idgrup]);
        }
        return User::find($uid)->update(['aksesgrup_id' => $idgrup]);
    }

    public function generateRoot($uid)
    {
        $grup = Aksesgrup::firstOrCreate(['alias'=>'root'], array('nama' => 'Root'));
        $idgrup = $grup->id;

        //generate aksesmenu
        $menus    = Menu::whereIn('kode', config('master.aksesgrup.root.menu'))->get();
        foreach ($menus as $menu) {
            Aksesmenu::firstOrCreate(['menu_id'=>$menu->id,'aksesgrup_id'=>$idgrup]);
        }

        //generate aksessubmenu
        $submenus    = Submenu::whereIn('kode', config('master.aksesgrup.root.submenu'))->get();
        foreach ($submenus as $submenu) {
            Aksessubmenu::firstOrCreate(['submenu_id'=>$submenu->id,'aksesgrup_id'=>$idgrup]);
        }
        return User::find($uid)->update(['aksesgrup_id' => $idgrup]);;
    }

    public function scopeByLevel($query)
    {
        if (\Auth::user()->level == 1) {
            return $query->latest();
        } else {
            return $query->where('id','!=',1)->latest();
        }
        
    }
}
