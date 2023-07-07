<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'surat';
    protected $guarded = ['created_at', 'updated_at'];
}
