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

    public function getUser()
    {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function getPostLike()
    {
    	return $this->hasOne('App\Models\PostLike', 'post_id', 'id');
    }

    public function getPostComments()
    {
        return $this->hasMany('App\Models\PostComment', 'post_id', 'id');
    }
}
