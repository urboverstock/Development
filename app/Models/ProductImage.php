<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    public $appends = ['file_path'];

    public function getFilePathAttribute($value){
        if($this->attributes['file'] != null){
            return asset($this->attributes['file']);
        }else{
            return asset('assets/images/default.png');
        }
    }
}
