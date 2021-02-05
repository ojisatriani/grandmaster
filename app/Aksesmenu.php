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
}
