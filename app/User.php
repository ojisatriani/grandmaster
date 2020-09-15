<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'nama', 'username', 'password', 'email', 'email_verified_at', 'level', 'aksesgrup_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function aksesgrup()
    {
        return $this->belongsTo('App\Aksesgrup');
    }

    public function setPasswordAttribute($value)
    {
        if ($value != "") {
            $this->attributes['password'] = bcrypt(base64_decode(trim($value)));
        }
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->email_verified_at = Carbon::now();
        });
    }

    public function scopeByLevel($query)
    {
        if (\Auth::user()->level == 1) {
            return $query->latest();
        } else {
            return $query->where('aksesgrup_id','!=',1)->latest();
        }
        
    }
}
