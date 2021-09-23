<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFavourite extends Model
{
    use HasFactory;

    public function getUserDetail()
    {
    	return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getProductDetail()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
