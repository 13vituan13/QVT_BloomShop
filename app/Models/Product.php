<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $casts = [
		'product_id' => 'int'
	];
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'Inventory_number',
        'categogry_id',
        'created_at',
        'updated_at',
    ];
}
