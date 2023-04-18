<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\VipMember;
use App\Models\City;
use App\Models\District;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $casts = [
		'customer_id' => 'int'
	];
    protected $fillable = [
        'customer_id',
        'name',
        'zipcode',
        'address',
        'district_id',
        'city_id',
        'birthday',
        'phone',
        'email',
        'vip_id',
        'password',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
    ];
    public function vip_member()
    {
        return $this->hasOne(VipMember::class,'vip_id','vip_id');
    }
    public function city()
    {
        return $this->hasOne(City::class,'id','city_id');
    }
    public function district()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
