<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['customer_id', 'item', 'totalPrice', 'totalQty', 'code'];

    public function customerInOrder(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
