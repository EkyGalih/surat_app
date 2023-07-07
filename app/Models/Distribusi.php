<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Distribusi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'distribusi';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function Surat()
    {
        return $this->belongsTo(Surat::class);
    }

    public function Bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
