<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';
    protected $primaryKey = 'product_id';
    protected $casts = [
		'product_id' => 'int'
	];
    protected $fillable = [
        'no',
        'image',
    ];
}
