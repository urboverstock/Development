<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //

    public function getUserDetail()
    {
    	return $this->belongsTo('App\Models\User', 'seller_id', 'id');
    }
}
