<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'bidang';
    public $incrementing = false;
    protected $guarded = ['createdAt', 'updatedAt'];

    public function Distribusi()
    {
        return $this->hasOne(Distribusi::class);
    }
}
