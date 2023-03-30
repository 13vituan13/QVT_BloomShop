<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'order_id';
    protected $casts = [
		'order_id' => 'int'
	];
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
