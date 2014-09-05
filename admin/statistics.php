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
		<h1>Administrative Statistics</h1>
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
			<fieldset style="float: left; padding: 15px; width: 350px; height: 250px;"><legend style="text-align: center;"><h2>Departments</h2></legend> 
			<div style=""><div>Accounts:</div> <div><?php echo $numAccounts; ?></div></div>
			
			
			
			</fieldset> 
			<fieldset style="float: right; padding: 15px; width: 350px; height: 250px;"><legend style="text-align: center;"><h2>Payroll</h2></legend> 
			<div style=""><div>Store:</div> <div><?php echo $numAccounts; ?></div></div>
			
			
			
			</fieldset>
			<fieldset style=" margin: 0 auto 0; float: center; padding: 15px; width: 350px; height: 250px;"><legend style="text-align: center;"><h2>Inventory</h2></legend> 
			<div style=""><div>Inventory:</div> <div><?php echo $numAccounts; ?></div></div>
			
			
			
			</fieldset>
			<fieldset style="float: left; padding: 15px; width: 350px; height: 250px;"><legend style="text-align: center;"><h2>Sale Trends</h2></legend> 
			<div style=""><div>L:</div> <div><?php echo $numAccounts; ?></div></div>
			
			
			
			</fieldset>
			<fieldset style="float: right; padding: 15px; width: 350px; height: 250px;"><legend style="text-align: center;"><h2>Pricebook Details</h2></legend> 
			<div style=""><div>R:</div> <div><?php echo $numAccounts; ?></div></div>
			
			
			
			</fieldset>
			<fieldset style="margin: 0 auto 0; float: center; padding: 15px; width: 350px; height: 250px;"><legend style="text-align: center;"><h2>Statistics</h2></legend> 
			<div style=""><div>C:</div> <div><?php echo $numAccounts; ?></div></div>
			
			
			
			</fieldset>
			</div>
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
<?php include('footer.php'); ?>
<!-- end footer -->
 
</body>
</html>
<?php
}
?>