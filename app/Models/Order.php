<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $casts = [
		'order_id' => 'int'
	];
    protected $fillable = [
        'order_id',
        'customer_id',
        'customer_id',
        'date',
        'customer_name',
        'customer_email',
        'zipcode',
        'customer_address',
        'customer_phone',
        'status_id',
        'total_money',
        'flg_del',
    ];
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class,'order_id','order_id');
    }
}
