<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsedCoupon extends Model
{
    public function coupon() {
    	return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }
}
