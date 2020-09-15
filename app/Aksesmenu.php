<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aksesmenu extends Model
{
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
}
