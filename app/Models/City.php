<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'citys';
    protected $primaryKey = 'id';
    protected $casts = [
		'id' => 'string'
	];
    protected $fillable = [
        'id',
        'name',
        'type',
        'slug'
    ];
}
