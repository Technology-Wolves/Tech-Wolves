<?php
namespace App;

class Cart
{
    public $items;
    public $totalQty = 0;
    public  $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($item, $id){
        $storedItem = ['qty'=>0, 'price'=>$item->discountedPrice, 'item'=>$item];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->discountedPrice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->discountedPrice;
    }
    public function incrementByOne($id){
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['discountedPrice'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['discountedPrice'];

        if ($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['discountedPrice'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['discountedPrice'];

        if ($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}