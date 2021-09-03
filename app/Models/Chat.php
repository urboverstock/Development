<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function senderName()
    {
    	return $this->belongsTo('App\Models\User', 'sender_id', 'id');
    }
}
