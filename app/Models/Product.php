<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category() {
    	return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

	public function product_image() {
    	return $this->hasOne(ProductImage::class, 'product_id', 'id')->where('status', ACTIVE_STATUS);
    }

    public function images() {
    	return $this->belongsTo(ProductImage::class, 'product_id', 'id')->where('status', ACTIVE_STATUS);
    }

    public static function getLatestProducts($request) {
    	$query = Product::with('category:id,name', 'images:id,product_id,file,file_type')->where('status', ACTIVE_STATUS);

    	return $query->orderBy('id', 'DESC')->paginate($request->limit);
    }

    public static function getProducts($request) {
    	$query = Product::with('category:id,name',
    						 'images:id,product_id,file,file_type',
    						 'user:id,first_name')
    						->where('status', ACTIVE_STATUS);
    	if($request->search) {
    		$query->where(function($q) use ($request) {
    			$q->where('name', 'LIKE', "%{$request->search}%"); 
    		});
    	}
		if($request->category) {
			$query->where('category_id', $request->category);
		}
		if($request->orderBy) {
			$query->orderBy('id', $request->orderBy);
		}
    	return $query->orderBy('id', 'DESC')->paginate($request->limit);
    }
}
