<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loginlog extends Model
{
    protected $fillable = [
        'username', 'ip',
    ];

    public function kapan()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
