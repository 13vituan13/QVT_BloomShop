<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $casts = [
		'category_id' => 'int' // dùng để chuyển đổi kiểu dữ liệu vd:cột img là json => array
	];
    protected $fillable = [
        'category_id',
        'name',
    ];
}
