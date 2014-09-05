<?php
session_start();
require('db.php'); 
	
	$action = $_GET['action'];
	$id = $_GET['id'];
	$upc = $_GET['upc'];
	$qtyMsg = $_GET['qty'];
	$item = $_GET['item'];

	//requires action and ID
	if($action == "remove"){
		
		$actionMsg = " removed " . $qtyMsg ." from Active Inventory";
		mysql_query("DELETE FROM active_inventory WHERE date = '$id' LIMIT 1") or die(mysql_error());
		mysql_query("INSERT INTO admin_newsfeed (id, description, name, date) VALUES ('', '".$actionMsg."', '".$_SESSION["username"]."', '".date('Y-m-d H:i:s')."')") or die(mysql_error());
		
		header("Location: index.php");
	}

if($action == "add"){
		$qty = $_GET['qty'];
		$actionMsg = " added " . $qty . " of an <a target='new' href='../viewItem.php?item=" . $item . "'>item</a> to Active Inventory";
		mysql_query("INSERT INTO admin_newsfeed (id, description, name, date) VALUES ('', '".$actionMsg."', '".$_SESSION["username"]."', '".date('Y-m-d H:i:s')."')") or die(mysql_error());
		
		header("Location: index.php");
	} 

?>