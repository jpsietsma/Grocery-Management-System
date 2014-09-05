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
		<h1 style="text-align: center;">Welcome to the Grocery Management System</h1>
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
			<h2 style="text-align: center;">Introduction: What G.M.S. can do for your business:</h2>
			
			<table>
			<tr>
			<td style="padding-right: 25px;">
			<fieldset style="float: left; width: 250px; height: 400px; padding-top: 25px; padding-bottom: 1px; padding-left: 10px; padding-right: 10px;"><legend style="text-align: center; "><h3 style="padding-left: 5px; padding-right: 5px; ">Inventory Management</h3></legend>
			<table>
				<tr>
				<td height="300px;">
			<p style="padding-right: 5px; font-size: 12px;"><i><b>The Grocery Management System (G.M.S.)</i></b> was designed as a recording and reporting tool for tracking the accrual and movement of inventory in a retail store environment. Inventory is no longer a hassle!</p>
			<div style="padding-left: 30px; font-size: 11px; padding-right: 5px;">
				<img src="welcome_clipboardguy.jpg" /> <br><b>Accurate Inventory Tallies!</b><br>
			</div>
				</td>
				</tr>
			
			<tr>
			<td style="height: 25px;">
			<div style = "border-top: 1px dashed gray; text-align: center; color: black; font-size: 10px; font-weight: bold; padding-right: 10px; "> >>See help topic: <a href="help/index.php?topic=Inventory" >IAMS (General) </a></div> 
			</td>
			</tr>
			</table>
			</fieldset>
			</td>
			
			<td style="padding-right: 25px;">
			<fieldset style="float: left; width: 250px; height: 400px; padding-top: 25px; padding-bottom: 1px; padding-left: 10px; padding-right: 10px;"><legend style="text-align: center; "><h3 style="padding-left: 5px; padding-right: 5px; ">Profit/Margin Increases</h3></legend>
			<table>
				<tr>
				<td height="300px;">
			<p style="padding-right: 5px; font-size: 12px;"><i><b>The Grocery Management System (G.M.S.)</i></b> was designed as a recording and reporting tool for tracking the accrual and movement of inventory in a retail store environment.  Automated reports makes this an easy task.  The benefits of using G.M.S. to manage your retail store include:</p>
			<div style="padding-left: 30px; font-size: 11px; padding-right: 5px;">
				<img src="welcome_profitup.jpg" /> <br><b>Less Spoilage, More Profit!</b>
				</div>
				</td>
				</tr>
			
			<tr>
			<td style="height: 25px;">
			<div style = "border-top: 1px dashed gray; text-align: center; color: black; font-size: 10px; font-weight: bold; padding-right: 10px; "> >>See help topic: <a href="help/index.php?topic=Inventory" >IAMS (General) </a></div> 
			</td>
			</tr>
			</table>
			</fieldset>
			</td>
			
			<td style="padding-right: 25px;">
			<fieldset style="float: left; width: 250px; height: 400px; padding-top: 25px; padding-bottom: 1px; padding-left: 10px; padding-right: 10px;"><legend style="text-align: center; "><h3 style="padding-left: 5px; padding-right: 5px; ">Increased Accountability</h3></legend>
			<table>
				<tr>
				<td height="300px;">
			<p style="padding-right: 5px; font-size: 12px;"><i><b>The Grocery Management System (G.M.S.)</i></b> was designed as a recording and reporting tool for tracking the accrual and movement of inventory in a retail store environment.  Automated reports makes this an easy task.  The benefits of using G.M.S. to manage your retail store include:</p>
			<div style="padding-left: 30px; font-size: 11px; padding-right: 5px;">
				<img src="piechart.jpg" /> <br><b>See Where Your Money is Going!</b>
				</div>
				</td>
				</tr>
			
			<tr>
			<td style="height: 25px;">
			<div style = "border-top: 1px dashed gray; text-align: center; color: black; font-size: 10px; font-weight: bold; padding-right: 10px; "> >>See help topic: <a href="help/index.php?topic=Inventory" >IAMS (General) </a></div> 
			</td>
			</tr>
			</table>
			</fieldset>
			<td>
			
			<fieldset style="float: left; width: 250px; height: 400px; padding-top: 25px; padding-bottom: 1px; padding-left: 10px; padding-right: 10px;"><legend style="text-align: center; "><h3 style="padding-left: 5px; padding-right: 5px; ">Employee Collaboration</h3></legend>
			<table>
				<tr>
				<td height="300px;">
			<p style="padding-right: 5px; font-size: 12px;">
			Employee Collaboration is a trending feature many businesses are taking advantage of.  Why
			Put all the work on one or two employees when groups get better results?  The employee
			management features included with G.M.S. allow you to do just that, collaborate.  Multiple employees
			may participate in the same inventory, at the same time.  Allowing faster and more accurate counts
			and accountability!
			</p>
			<div style="padding-left: 55px; font-size: 11px; padding-top: 30px;">
				<img src="welcome_user.png" width="125px;" height="125px;"/> <br><b>Teamwork Builds Businesses!</b><br>
				</div>
				</td>
				</tr>
			
			<tr>
			<td style="height: 25px;">
			<div style = "border-top: 1px dashed gray; text-align: center; color: black; font-size: 10px; font-weight: bold; padding-right: 10px; "> >>See help topic: <a href="help/index.php?topic=Inventory" >IAMS (General) </a></div> 
			</td>
			</tr>
			</table>
			</fieldset>
			</div>
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
	<div style="float: right; font-weight: bold; font-size: 25px;" id="next" class="next_button">Next <a href="index2.php"><img style="vertical-align: middle;" src="images/icons/coquette/png/128x128/next.png" height="64px" width="64px" /></a></div>
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