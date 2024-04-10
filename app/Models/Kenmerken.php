<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenmerken extends Model
{
    use HasFactory;
    protected $fillable = ['brandstof_type'];
    public $timestamps = false;
}
