<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $casts = [
		'id' => 'int'
	];
    protected $fillable = [
        'customer_id',
        'date'
    ];
}
