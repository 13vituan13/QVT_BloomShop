<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    protected $table = 'personal_access_tokens';
    protected $primaryKey = 'id';
    protected $casts = [
		'id' => 'int'
	];
    protected $fillable = [
        'id',
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'abilities',
        'last_used_at',
        'expires_at',
        'created_at',
        'updated_at',
    ];
    public static function findToken($token)
    {
        return static::where('token', hash('sha256', $token))->exists();
    }

}
