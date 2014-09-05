<?php
session_start();

if(!isset($_SESSION[username])){
	header("location: scripts/login.php");
} else {

 ?>
<?php include('header.php'); ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1 style="text-align: center;">System Dashboard</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<table style="width: 100%;">
				<tr>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/itemSearch.png" /><br>Product Search</div>
				</td>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/Invoice.png" /><br>Invoices</div>
				</td>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/coquette/png/64x64/search_page.png" /><br>Archived Invoices</div>
				</td>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/coquette/png/64x64/mail.png" /><br>Messages</div>
				</td>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/coquette/png/64x64/process.png" /><br>Settings</div>
				</td>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/coquette/png/64x64/help.png" /><br>Help</div>
				</td>
				<td>
					<div style="font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/spoilage.png" /><br>Spoilage</div>
				</td>
				</tr>
				
				<tr>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/requisition.png" /><br>Requisitions</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/price.png" /><br>Price Changes</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><a href="createInventory.php"><img width="115px" height="100px;" src="images/icons/inventory.jpg" /></a><br>Inventory</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/itemImages.png" /><br>Item Images</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/adminlog.png" /><br>System Logs</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/trends.png" /><br>Item Trends</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><a href="viewVendorDetails.php"><img width="115px" height="100px;" src="images/icons/vendors.jpg" /></a><br>Vendors</div>
				</td>
				</tr>
				
				<tr>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/adminicon.png" /><br>Admin Functions</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/security.png" /><br>Security</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/users.png" /><br>User Accounts</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/reports.png" /><br>Item Reports</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/receiving.png" /><br>Receive Order</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/coquette/png/64x64/clock.png" /><br>Reminders</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/coquette/png/64x64/calendar.png" /><br>Events</div>
				</td>
				</tr>
				
				<tr>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/barcodes.png" /><br>Barcode/UPC's</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/departments.png" /><br>Dept. Breakdown</div>
				</td>
				<td>
					<div style="margin-top: 25px; font-size: 14px; font-weight: bold; text-align: center;"><img width="115px" height="100px;" src="images/icons/addressBook.png" /><br>Address Book</div>
				</td>
				</tr>
				</table>
			</td>
			</tr>
			</table>
			<!--  end table-content  -->
	
			<div class="clear"></div>
			
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<?php include('footer.php'); ?>
<!-- end footer -->
 
</body>
</html>
<?php
}
?>