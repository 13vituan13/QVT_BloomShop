<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $casts = [
		'customer_id' => 'int'
	];
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'vip_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
    ];
}
