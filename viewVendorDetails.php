<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery") or die(mysql_error());

if(!isset($_SESSION['username'])){
	header("location: scripts/login.php");
}

$vendors = mysql_query("SELECT * FROM vendors ") or die(mysql_error());

while($row = mysql_fetch_assoc($vendors)){
    $vendor_array[] = $row; // Inside while loop
}
 ?>
<?php include('header.php'); ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1 style="text-align: center;">View Vendor Details</h1>
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
				<form><label for="users">Select a vendor:</label>
<select name="users" onchange="showUser(this.value)">
<option value="">Vendor:</option>
<?php 

				foreach($vendor_array as $vendor){

				?>
					<option value="<?php echo $vendor['vendID']; ?>"><?php echo $vendor['vendName']; ?></option>
					
				<?php
				}
			?>
</select>
</form>
<br>
<div id="txtHint"><b>Please select a vendor to view Contact Information.</b></div>
	
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