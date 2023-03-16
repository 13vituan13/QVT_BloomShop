<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    protected $table = 'status_order';
    protected $primaryKey = 'status_id';
    protected $fillable = [
        'status_id',
        'name',
    ];
}
