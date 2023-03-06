<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class VipMember extends Model
{
    protected $table = 'vip_member';
    protected $primaryKey = 'vip_id';
    protected $fillable = [
        'name',
        'offer'
    ];
}
