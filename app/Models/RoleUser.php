<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{   
    public $timestamps = false;
    protected $table = 'role_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_id',
        'user_id',
    ];
}
