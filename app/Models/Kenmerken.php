<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Kenmerken extends Model
{
    use HasFactory;
    protected $fillable = ['brandstof_type'];
    protected $table = 'kenmerken';
    public $timestamps = false;
}
