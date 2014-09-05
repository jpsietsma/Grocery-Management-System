<?php
session_start();

if(!isset($_SESSION['username'])){
	
	header("location: ../scripts/login.php");
	
} else {

 ?>
<?php include('header.php'); ?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">

<div id="page-heading" style="padding-left: 160px;"><h1>G.M.S. Administration Center | Dashboard</h1></div>

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
		Woo content!
	</td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>

	<div id="admin_newsfeed" style="margin-left: 25px; width: 250px;">
		

		<div id="admin-news-top">
		
			<img src="images/forms/header_admin_newsfeed.gif" width="271" height="43" alt="" />
		
		</div>
		
		<div>
			
			<iframe style="border: 0px; margin: 0 auto 0; height: 575px; width: 97%;" src="newsfeed/" scrolling="no" />
		
		</div>
	
	</div>

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

<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<?php include('../footer.php'); ?>
<!-- end footer -->
 
</body>
</html>
<?php
}
?>