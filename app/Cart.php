<?php

namespace App;



class Cart
{ 
    public $items;
    public $totalQty = 0;
    public $totalPrice =0;


    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

    public function add($request, $product){
        $storedItem = ['qty'=>0 , 'price'=> $request->price, 'item' => $request];
        if ($this->items){
            if (array_key_exists($product, $this->items)){
                $storedItem = $this->items[$product];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $request->price * $storedItem['qty'];
        $this->items[$product] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $request->price;
       
    }

}
