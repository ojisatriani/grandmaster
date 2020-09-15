<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aksessubmenu extends Model
{
    protected $fillable = [
        'submenu_id', 'aksesgrup_id'
    ];

	public function menu()
	{
        return $this->belongsTo('App\Menu');
	}

	public function submenu()
	{
        return $this->belongsTo('App\Submenu');
	}

	public function aksesgrup()
	{
        return $this->belongsTo('App\Aksesgrup');
	}
}
