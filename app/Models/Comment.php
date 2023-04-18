<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $casts = [
		'id' => 'int'
	];
    protected $fillable = [
        'id',
        'name',
        'content',
        'rating',
        'product_id',
    ];
}
