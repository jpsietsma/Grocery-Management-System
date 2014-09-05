<?php 
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery");

$getUPC = @$_GET['upc'];

$results = mysql_query("SELECT * FROM items WHERE itemUPC = $getUPC LIMIT 1") or die(mysql_error());
$row = mysql_fetch_array($results);
$vendorID = $row['itemVendorID'];

$vendors = mysql_query("SELECT vendName FROM vendors WHERE vendID = '$vendorID' LIMIT 1") or die(mysql_error());
$vendors = mysql_fetch_array($vendors);
$imagePath = "/IAMS/product_images/undefined.jpeg";

if(file_exists("./IAMS/product_images/".$row['itemUPC'].".jpg")){

$imagePath = "/IAMS/product_images/".$row['itemUPC'].".jpg";

}

include('header.php'); 
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading" style="text-align: center; margin: 0 auto 10px; font-size: 30px; font-weight: bold; margin-left: -100px;"><?php echo $row['itemDescription']; ?> - <div style="font-size: 25px; margin-top: 10px;">(<?php echo $row['itemSize']; ?>)</div></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	<!--  start related-activities -->
	<div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
			
				<div class="left"><a href=""><img src="images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Item Details</h5>
					Change item details related to the
					current item.
					<ul class="greyarrow">
						<li><a href="">Persistent Changes</a></li> 
						<li><a href="">Edit Details</a> </li>
						<li><a href="">Change parent Price Book</a> </li>
						<li><a href="">Print Item Profile Page</a> </li>
						
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Delete items/pricebooks</h5>
					Remove items, pricebooks, and pricebook details
					<ul class="greyarrow">
						<li><a href="">Remove item from pricebook</a></li> 
						<li><a href="">Persistant item removal</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="images/icons/checkmark.png" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Inventory</h5>
					Actions related to inventory recording
					and product values
					<ul class="greyarrow">
						<li><a href="">Add product to inventory</a></li> 
						<li><a href="">Change related inventory cost</a> </li>
						<li><a href="">Start new inventory</a></li>
						<li><a href="">Run item inventory report</a></li> 
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Advanced Reports</h5>
					Run reports related to inventory, items, departments
					and other fiscal item related material.
					<ul class="greyarrow">
						<li><a href="">Run full inventory reports (PDF)</a> </li>
						<li><a href="">Run departmental reports {PDF)</a> </li>
					</ul>
				</div>
				<div class="clear"></div>
				
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
	<!-- end related-activities -->
	
	<!-- start id-form -->
		<table border="1" style="border: 1px solid black; width: 825px; float: left;">
			<tr>
				<td id="product-image-td" rowspan="8"><img id="product-image" src="./<?php echo $imagePath; ?>" alt="<?php echo $row['itemDescription']; ?>" height="265" width="300" style="margin: 0 auto 0;"/></td>
			</tr>
			<tr valign="top">
				<td class="table-data"><div class="product-data-header">Item Number:</div><div class="product-data">[<?php echo $row['itemNumber']; ?>]</div></td><td class="table-data"><div class="product-data-header">Item Retail:</div> <div class="product-data">[<?php echo $row['itemRetail']; ?>]</div></td>
			</tr>
			<tr valign="top">
				<td class="table-data-alt"><div class="product-data-header-alt">UPC Number:</div><div class="product-data-alt">[<?php echo $row['itemUPC']; ?>]</div></td><td class="table-data-alt"><div class="product-data-header-alt">Item Cost:</div><div class="product-data-alt">[<?php echo $row['itemCost']; ?>]</div></td>
			</tr>
			<tr valign="top">
				<td class="table-data"><div class="product-data-header">Item State:</div><div class="product-data">[<?php echo $row['itemState']; ?>]</div></td><td class="table-data"><div class="product-data-header">Item Markup:</div><div class="product-data">[<?php echo $row['itemNumber']; ?>]</div></td>
			</tr>
			<tr valign="top">
				<td class="table-data-alt"><div class="product-data-header-alt">Item Category:</div><div class="product-data-alt">[<?php echo $row['itemCategory']; ?>]</div></td><td class="table-data-alt"><div class="product-data-header-alt">Inventory Qty:</div><div class="product-data-alt"><?php echo $row['itemInventoryQuantity']; ?></div></td>
			</tr>
			<tr valign="top">
				<td class="table-data"><div class="product-data-header">Sub-Category:</div><div class="product-data">[<?php echo $row['itemSubCategory']; ?>]</div></td><td class="table-data"><div class="product-data-header">Movement:</div><div class="product-data">[Average]</div></td>
			</tr>
			<tr valign="top">
				<td class="table-data-alt"><div class="product-data-header-alt">Case Pack:</div><div class="product-data-alt">[<?php echo $row['itemPack']; ?>]</div></td><td class="table-data-alt"><div class="product-data-header-alt">Audit Class:</div><div class="product-data-alt">[Low Risk]</div></td>
			</tr>
			<tr valign="top">
				<td class="table-data"><div class="product-data-header">Storage:</div><div class="product-data">[<?php echo $row['itemInventoryLocationID']; ?>]</div></td><td class="table-data"><div class="product-data-header">Vendor:</div><div class="product-data"><?php echo $vendors['vendName']; ?></div></td>
			</tr>
		</table>
		
		<br>
		
		<table>
			<tr>
				<div id="flip">Show Available Barcodes</div>
					<div id="panel">

						<table border="1" id="panelTable">
							<tr>
								<td width="275px" height="100px">
									<img style="margin: 0 auto 0;" src="./BMS/upca.php?upc=<?php echo $row['itemUPC']; ?>"></img><br><br>
									<div style="border-top: 1px solid black; width: 100%; float: bottom;">UPC-A Barcode</div>
								</td>
								<td width="275px" height="100px">
									<img  style="height: 48px;" src="./BMS/msi.php?item=<?php echo $row['itemNumber']; ?>"></img><br><br><br>
									<div style="border-top: 1px solid black; width: 100%; float: bottom;">MSI Barcode</div>
								</td>
								<td width="275px" height="100px">
									<img src="./BMS/code128.php?upc=<?php echo $inventory['palletID']; ?>"></img><br><br><br><br>
									<div style="border-top: 1px solid black; width: 100%; float: bottom;">PalletID Barcode</div>
								</td>
							</tr>
						</table>
					</div>
			</tr>
			
			<tr>
				
				<td>
				
					<?php include('inventory/viewGraph.php'); ?>
				
				</td>
				
			</tr>
			
		</table>

</div>
				<td>
					</td>
				<td>
					
				</td>
				<td>
					</td>
			</tr>
		</table>
				
		
	<!-- end id-form  -->

	</td>
	<td>

	</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<?php include('footer.php'); ?>
<!-- end footer -->
 
</body>
</html>