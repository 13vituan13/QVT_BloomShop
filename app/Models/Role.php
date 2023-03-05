<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    protected $casts = [
		'role_id' => 'int'
	];
    protected $fillable = [
        'name',
        'description'
    ];
}
