<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berkas extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $casts = [
                        'file' => 'array',
                    ];

    protected $fillable = [
        'user_id', 'nama', 'file'
    ];
    
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function getFileBerkasAttribute()
    {
        return storage_path($this->file['path'].'/'.$this->file['nama']);
    }

    public function getFileNamaAttribute()
    {
        return $this->file['nama'];
    }

    public function getFilePathAttribute()
    {
        return $this->file['path'];
    }

    public function getUrlBerkasAttribute()
    {
        return asset('berkas/download/'.$this->id.'/'. $this->file_nama);
    }
    
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->user_id = \Auth::user()->id ?? NULL;
        });
    }

    public function hapus_lampiran()
    {
        try {
            if (file_exists($this->file_berkas)) {
                unlink($this->file_berkas);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}
