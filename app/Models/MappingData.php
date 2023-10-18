<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingData extends Model
{
    use HasFactory;
    protected $table = 'mapping_data';
    public $fillable = ['description', 'main_data_id', 'reason'],$timestamps = false;
    function main_data ()
    {
        return $this->belongsTo(MainData::class,'main_data_id');
    }

}
