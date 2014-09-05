<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery") or die(mysql_error());

if(!isset($_SESSION['username'])){
	#header("location: scripts/login.php");
}

if(!isset($_GET['page'])){

$units = mysql_query("SELECT * FROM dining_units ") or die(mysql_error());

while($row = mysql_fetch_assoc($units)){
    $unit_array[] = $row; // Inside while loop
}
 ?>
<?php include('header.php'); ?>
<!-- start content-outer -->
<div id="content-outer" width="1300">
<!-- start content -->
<div id="content" width="1300">
<table border="0" width="1300" cellpadding="0" cellspacing="0" id="content-table">
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
	<div id="content-table-inner" width="1300">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	<div id="page-heading" style="float: left; margin-right: 35px; height: 100%;"><h1><img style="vertical-align: middle;" src="inventory/images/icons/clipboard_new_inventory.png" width="35" height="45" />&nbsp;&nbsp; Add Items to New Inventory</h1></div>
		<!--  start step-holder -->
			<div id="step-holder" style="float: center;">
			<div class="step-no-off" style="margin-right: 12px; margin-top: -5px; "><img src="inventory/images/icons/green_check.png" style="width: 30px; height: 30px;" title="Step One Complete" /></div>
			<div class="step-light-left"><a href="createInventory.php">Create Inventory</a></div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no">2</div>
			<div class="step-dark-left">Add Items</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left"><a href="createInventory3.php">Finalize Inventory</a></div>
			<div class="step-light-right">&nbsp;</div>
			<div class="clear"></div>
			<hr>
		</div><br>
		<iframe src="inventory/" width="1325" height="600" style="margin-left: -50px; border: none;"></iframe>

</td>
</tr>
</table>
 
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