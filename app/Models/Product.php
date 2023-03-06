<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

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
        'Inventory_number',
        'categogry_id',
        'created_at',
        'updated_at',
    ];
    public function productImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }
}
