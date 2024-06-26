<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    public $table = 'autos';
    protected $fillable = ['naam', 'merk', 'brandstof_id'];
    public $timestamps = false;
}
