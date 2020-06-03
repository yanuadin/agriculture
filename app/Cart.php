<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addItem($qty, $item, $id){
        if($item->discount){
            if($item->unit == "Harga")
                $price = $item->price - $item->discount;
            else
                $price = $item->price - ($item->price * $item->discount / 100);
        }else
            $price = $item->price;

        $storedItem = ['qty' => 0, 'price' => 0, 'item' => $item];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] = $qty;
        $storedItem['price'] = $price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty = count($this->items);

        $this->totalPrice = 0;
        foreach ($this->items as $itm){
            $this->totalPrice += $itm['price'];
        }
    }
}
