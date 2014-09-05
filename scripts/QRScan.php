<?php
/*
QRScan.php
James Sietsma
08/15/2011
*/

$searchUPC = $_GET['upc'];
$searchTime = date("m/d/Y h:i:s");
$searchFormat = $_GET['format'];

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
  echo "Hello Android User!<br>";
}

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery") or die(mysql_error());

$result = mysql_query("SELECT * FROM products WHERE itemUPC = '$searchUPC' LIMIT 1") or die(mysql_error());
$row = mysql_fetch_array($result);

$itemNumber = $row['itemNumber'];
$itemUPC = $row['itemUPC'];
$itemName = $row['itemDescription'];
$itemRetail = $row['itemRetail'];
$itemCost = $row['itemCost'];
$itemPack = $row['casePack'];

?>
<html>
<head>
<title>Grocery Management System | MobiScan QR</title>
</head>

<body>
<br><br>
Input Format: <?php echo $searchFormat; ?><br>
Query Timestamp: <?php echo $searchTime; ?><br>
UPC Number Query; <?php echo $searchUPC; ?><br>
<table border="0" name="mobile_container" style="border: 1px dashed grey; margin: 0 auto 0; width: 800px; font-weight: bold; font-size: 15px; height: 1200px;">
	<tr>
		<td colspan="2" style="border: 1px dashed grey; height: 100px; text-align: center; margin: 0 auto 0; font-style: bold; font-size: 50px;">
			<?php echo $itemName; ?>
		</td>
	</tr>
	
	<tr rowspan="10" style="background-color: white;">
		<td style="border: 1px dashed black; background: url(IAMS/product_images/<?php echo $itemUPC; ?>.jpg); background-repeat: no-repeat; float: left; width: 400px; height: 500px;">
			
		</td>
		<td style="border-bottom: 1px dashed grey; border-top: 1px dashed grey; text-align: center; padding: 2px; float: right; height: 46px; width: 385px; font-size: 35px; color: #92B22C">
			Item Number
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; padding: 2px; float: right; height: 46px; width: 385px; font-size: 30px;">
			<?php echo $itemNumber; ?>
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; margin: 0 auto 0; padding: 2px; float: right; height: 46px; width: 385px; font-size: 35px; color: #92B22C">
			UPC Number
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; padding: 2px; float: right; height: 46px; width: 385px; font-size: 30px;">
			<?php echo $itemUPC; ?>
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; margin: 0 auto 0; padding: 2px; padding: 2px; float: right; height: 45px; width: 385px; font-size: 35px; color: #92B22C">
			Retail Price 
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; padding: 2px; float: right; height: 45px; width: 385px; font-size: 30px;">
			<?php echo $itemRetail; ?>
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; margin: 0 auto 0; padding: 2px; float: right; height: 45px; width: 385px; font-size: 35px; color: #92B22C">
			Item Cost
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; padding: 2px; float: right; height: 45px; width: 385px; font-size: 30px;">
			<?php echo $itemCost; ?>
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; margin: 0 auto 0; padding: 2px; float: right; height: 45px; width: 385px; font-size: 35px; color: #92B22C">
			Inventory Qty:
		</td>
		<td style="border-bottom: 1px dashed grey; text-align: center; padding: 2px; float: right; height: 45px; width: 385px; font-size: 30px;">
			xxxx
		</td>
	</tr>
	
	<tr>
		<td style="float: right;">
			Last Action: XX-XX-XXXX 
		</td>
	</tr>
	
	<tr>
		<td style="float: left;">
			Item Cost: <?php echo $itemCost; ?>
		</td>
		<td style="float: right;">
			Case Pack: <?php echo $itemPack; ?>
		</td>
	</tr>
	
		<tr>
		<td style="float: left;">
			Item Cost: <?php echo $itemCost; ?>
		</td>
		<td style="float: right;">
			Case Pack: <?php echo $itemPack; ?>
		</td>
	</tr>
	
		<tr>
		<td style="float: left;">
			Item Cost: <?php echo $itemCost; ?>
		</td>
		<td style="float: right;">
			Case Pack: <?php echo $itemPack; ?>
		</td>
	</tr>
</table>

</body>

</html>


	

