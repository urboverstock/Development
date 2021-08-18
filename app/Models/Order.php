<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getOrderDetail()
    {
    	return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }

    public function getUserAddress()
    {
    	return $this->belongsTo('App\Models\Address', 'user_id', 'user_id');
    }

    public function getUserDetail()
    {
    	return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    
}
