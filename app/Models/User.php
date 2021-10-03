<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $appends = ['profile_img', 'full_name'];

    public function getProfileImgAttribute($value){
        if(isset($this->attributes['profile_pic']) && $this->attributes['profile_pic'] != null){
            return asset($this->attributes['profile_pic']);
        }else{
            return asset('assets/images/default_profile_img.png');
        }
    }

    public function getFullNameAttribute($value){
        if(isset($this->attributes['last_name'])){
            return $this->attributes['first_name'].' '.$this->attributes['last_name'];
        }else{
            return $this->attributes['first_name'];
        }
    }

    public function role() {
        return $this->belongsTo(UserRole::class, 'user_type', 'id');
    }

    public function user_documents() {
        return $this->hasMany(UserDocument::class, 'user_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'user_id', 'id')
            ->orderBy('id', 'desc');
    }

    public static function getSellers($request) {
        $query = User::with(['role' => function($q) {
                            $q->select('id', 'name');
                            $q->where('name', 'Seller');
                        }])
                        ->wherehas('role', function($q) {
                            $q->where('name', 'Seller');
                        });

        return  $query->paginate($request->limit);
    }

    public function storeDetail()
    {
        return $this->hasOne('App\Models\SellerStore', 'user_id', 'id');
    }
}
