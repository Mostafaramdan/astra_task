<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table2 extends Model
{
    use HasFactory;
    protected $table = 'table_2';
    public $fillable = ['description', 'table_1_id', 'reason'],$timestamps = false;

}
