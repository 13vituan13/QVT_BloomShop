<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamps = false;
    protected $table = 'product_image';
    protected $primaryKey = 'product_id';
    protected $casts = [
		'product_id' => 'int'
	];
    protected $fillable = [
        'product_id',
        'image',
    ];
}
