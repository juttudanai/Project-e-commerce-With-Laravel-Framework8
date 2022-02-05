<?php
namespace App\Models;

class Cart{
    public $item;
    public $totalQuantity;
    public $totalPrice;


    public function __construct($sessionCart)
    {
        if($sessionCart != Null){
            $this->item = $sessionCart->item;
            $this->totalQuantity = $sessionCart->totalQuantity;
            $this->totalPrice =  $sessionCart->totalPrice;
        }else{
            $this->item = [];
            $this->totalQuantity = 0;
            $this->totalPrice =  0;
        }

    }
    public function addItemToCart($id, $product){
        $price = (int)($product->product_price);

        if (array_key_exists($id, $this->item)) {
            $list_item = $this->item[$id];
            $list_item['quantity']++;
            $list_item['price'] = $list_item['price'] + $price;

        }else{
            $list_item = ['quantity' => 1, 'price' => $price, 'data' => $product];
        }

        $this->item[$id] = $list_item;
        $this->totalQuantity ++;
        $this->totalPrice = $this->totalPrice +$price;
    }

    public function updateCart(){
        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($this->item as $items) {
            $totalQuantity += $items['quantity'];
            $totalPrice += $items['price'];
        }
        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

    public function addQuantity($id, $product, $amount){

        if ($amount > 0) {

            $price = (int)($product->product_price);

        if (array_key_exists($id, $this->item)) {
            $list_item = $this->item[$id];
            $list_item['quantity'] += $amount;
            $list_item['price'] = $list_item['quantity'] * $price;

        }else{
            $list_item = ['quantity' => $amount, 'price' => $price * $amount, 'data' => $product];
        }

        }
        $this->item[$id] = $list_item;
        $this->totalQuantity += $amount;
        $this->totalPrice = $this->totalPrice +$price;
    }
}
?>
