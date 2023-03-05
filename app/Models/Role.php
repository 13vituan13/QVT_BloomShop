<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $casts = [
		'id' => 'int'
	];
    protected $fillable = [
        'name',
        'description'
    ];
}
