<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

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

    public function getFileTargetAttribute()
    {
        return $this->file['target'];
    }

    public function getFileDiskAttribute()
    {
        return $this->file['disk'] ?? 'default';
    }

    public function getFileNamaAttribute()
    {
        return Arr::last(Str::of($this->file_target)->explode('/')->toArray());
    }

    public function getFileUrlAttribute()
    {
        return asset('berkas/download/'.$this->file_nama_alias);
    }

    public function getFileNamaAliasAttribute()
    {
        return $this->id .'-'. Str::slug($this->nama) . '.' .Arr::last(Str::of($this->file_target)->explode('.')->toArray());
    }

    public function getFileDownloadAttribute()
    {
        return Storage::disk($this->file_disk)->download($this->file_target, $this->file_nama_alias);
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
            if (Storage::disk($this->file_disk)->exists($this->file_target)) {
                Storage::disk($this->file_disk)->delete([$this->file_target]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
