<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aksessubmenu extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
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
