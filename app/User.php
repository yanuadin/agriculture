<?php

namespace App;

use App\Models\Item;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'password', 'role', 'photo', 'province_id', 'regency_id', 'district_id', 'store_name', 'default_password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function item(){
        return $this->hasMany(Item::class, 'user_id', 'id');
    }

    public function customerInOrder(){
        return $this->hasMany(OrderItem::class, 'customer_id', 'id');
    }
}
