<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'type',
        'district_id'
    ];
}
