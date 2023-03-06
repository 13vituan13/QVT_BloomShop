<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'banner_id';

    protected $fillable = [
        'name',
        'image'
    ];
}
