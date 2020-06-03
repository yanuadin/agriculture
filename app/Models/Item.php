<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['user_id','name', 'quantity', 'price', 'discount', 'unit', 'description', 'image1', 'image2', 'image3'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
