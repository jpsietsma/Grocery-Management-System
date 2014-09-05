<?php
//Date: 3-17-14
//File: item.class.php

class Item {
	public $itemName;
	public $itemCost;
	public $itemUPC;
	public $itemNumber;
	public $status;

	public function __construct ($name, $cost, $upc, $item) {
	
		$this->itemName = $name;
		$this->itemCost = $cost;
		$this->itemUPC = $upc;
		$this->itemNumber = $item;
		$this->status = "Object was successfully created";
		
	}
	
	public function getStatus() {
	
		return $this->status;
		
	}
	
	public function getItemName() {
	
		return $this->itemName;
		
	}
	
}

$item = new Item("Pillsbury", "2,16", "03680015567", "11911");
echo $item->getStatus();
echo $item->getItemName();

?>