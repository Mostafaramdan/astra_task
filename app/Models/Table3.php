<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table3 extends Model
{
    use HasFactory;
    protected $table = 'table_3';
    public $fillable = ['x', 'y', 'z'],$timestamps = false;
}
