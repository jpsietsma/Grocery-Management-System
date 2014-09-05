<?php
include('../graph/phpgraphlib.php');
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery") or die(mysql_error());
$getUPC = $_GET['itemUPC'];
$graph=new PHPGraphLib(250,300); 
$dataArray=array();
  
//get data from database
$sql="SELECT inventoryDate, itemQuantity FROM inventory WHERE itemUPC = '$getUPC' GROUP BY inventoryDate";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $salesgroup=$row["inventoryDate"];
      $count=$row["itemQuantity"];
      //add to data array
      $dataArray[$salesgroup]=$count;
  }
}
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Inventory count by Month");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph();
?>