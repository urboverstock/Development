<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    public function getUserPostFile()
    {
    	return $this->hasMany('App\Models\UserPostFile', 'user_post_id', 'id');
    }
}
