<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item,$id){

		//--------- get price promotion or price unit
		if($item->promotion_price == 0){
			$price = $item->unit_price;
		}else{
			$price = $item->promotion_price;
		}
		//----------------------------------------------

        $giohang = ['qty'=>0,
                    'price' => $price,
                    'item' => $item
                    ];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
        $giohang['qty']++;  // số lượng

        $this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $price;  // tổng tiền
	}

    //xóa 1
    public function reduceByOne($item,$id){

        if($qty_befor = Session('cart')->items[$id]['qty'] > 1){
            $qty_befor = Session('cart')->items[$id]['qty'];
            $qty_after = $qty_befor - 1;
            Session('cart')->items[$id]['qty'] = $qty_after;

            $price_each_product = Session('cart')->items[$id]['price'];

            $totalQty_before = Session('cart')->totalQty;
            $totalQty_after = $totalQty_before - 1;
            Session('cart')->totalQty = $totalQty_after;

            $totalPrice_before = Session('cart')->totalPrice;
            $totalPrice_after = $totalPrice_before - $price_each_product;
            Session('cart')->totalPrice = $totalPrice_after;
        }
    }

    public function addByOne($item,$id){

        if($qty_befor = Session('cart')->items[$id]['qty'] >= 1){
            $qty_befor = Session('cart')->items[$id]['qty'];
            $qty_after = $qty_befor + 1;
            Session('cart')->items[$id]['qty'] = $qty_after;

            $price_each_product = Session('cart')->items[$id]['price'];

            $totalQty_before = Session('cart')->totalQty;
            $totalQty_after = $totalQty_before + 1;
            Session('cart')->totalQty = $totalQty_after;

            $totalPrice_before = Session('cart')->totalPrice;
            $totalPrice_after = $totalPrice_before + $price_each_product;
            Session('cart')->totalPrice = $totalPrice_after;
        }
    }

	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
