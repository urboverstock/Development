<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOffer extends Model
{
    public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getProductDetails()
    {
    	return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
