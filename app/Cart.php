<?php

namespace App;
use Session;

class Cart {
	public $items       = null;
	public $title       = null;
	public $price       = 0;
	public $total_price = 0;
	public $total_qty   = 0;

	public function __construct($oldCart) {
		if ($oldCart) {
			$this->items       = $oldCart->items;
			$this->title       = $oldCart->title;
			$this->price       = $oldCart->price;
			$this->total_price = $oldCart->total_price;
			$this->total_qty   = $oldCart->total_qty;
		}
	}

	public function add($item, $id) {
		$stored_item = ['qty' => 0, 'title' => $item->title, 'price' => $item->regular_price, 'item' => $item, 'user_id' => Session::get('id')];
		if ($this->title) {
			if (array_key_exists($id, $item->title)) {
				$stored_item = $this->items[$id];
			}
		}

		$stored_item['qty']++;
		$stored_item['price'] = $item->regular_price*$stored_item['qty'];
		$this->items[$id]     = $stored_item;
		$this->total_qty++;
		$this->total_price += $item->regular_price;

	}

}