<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Category;
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
        'status_id',
        'flg_del',
        'created_at',
        'updated_at',
    ];
    public function status()
    {
        return $this->hasOne(Status::class,'status_id','status_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'category_id','category_id');
    }
    public function product_image()
    {
        return $this->hasMany(ProductImage::class,'product_id','product_id');
    }
}
