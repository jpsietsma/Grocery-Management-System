<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery") or die(mysql_error());

define('ITEMS_PER_PAGE', '5');

$searchQuery = @$_GET['q'];
$searchQueryType = @$_GET['type'];

if(!isset($_GET['page'])){
	
	$resultsPage = 1;

} else {

	$resultsPage = @$_GET['page'];

}

$limitEnd = ($resultsPage * ITEMS_PER_PAGE);
$limitStart = $limitEnd - ITEMS_PER_PAGE;

$mysqlQuery = "SELECT * FROM `products` WHERE `$searchQueryType` LIKE '%$searchQuery%' LIMIT $limitStart, $limitEnd";
$mysqlQueryTotal = "SELECT * FROM products WHERE `$searchQueryType` LIKE '%$searchQuery%'";
$resultsTotal = mysql_query($mysqlQueryTotal) or die(mysql_error());
$results = mysql_query($mysqlQuery) or die(mysql_error());
$numQueryResultsTotal = mysql_num_rows($resultsTotal);
$numQueryResults = mysql_num_rows($results);
$totalPages = ceil($numQueryResultsTotal/ITEMS_PER_PAGE);
$totalRows = mysql_num_rows($resultsTotal);
GLOBAL $queryItems;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>G.M.S. | Product Search "<?php echo $searchQuery; ?>"</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>

<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
	<form action="search2.php" method="get">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" name="q" value="" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  name="queryType" class="styledselect">
			<option value="select">select:</option>
			<option value="itemNumber">Item Number</option>
			<option value="itemUPC">UPC Number</option>
			<option value="itemDepartment">Department</option>
			<option value="itemCategory">Category</option>
		</select> 
		</td>
		<td>
		<input name="submit" type="image" src="images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</form>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="scripts/logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="current"><li><a href="index.php"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li class="sub_show"><a href="#nogo">System</a></li>
				<li><a href="#nogo">I.A.M.S. </a></li>
				<li><a href="#nogo">B.M.S. </a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b>Products</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="listProducts.php?q=all">View all products</a></li>
				<li><a href="scripts/addProduct.php">Add product</a></li>
				<li><a href="#nogo">Delete products</a></li>
				<li><a href="viewItem.php">View Item</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Price Books</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Upload New Pricebook</a></li>
				<li><a href="#nogo">Edit Price Book</a></li>
				<li><a href="#nogo">Change Active Price Book</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Clients</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Clients Details 1</a></li>
				<li><a href="#nogo">Clients Details 2</a></li>
				<li><a href="#nogo">Clients Details 3</a></li>
			 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Help</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">FAQ Guide</a></li>
				<li><a href="#nogo">G.M.S. Wiki</a></li>
				<li><a href="#nogo">Contact Support</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->


 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>
			<?php
				switch($_GET['type']){
				
					case "itemUPC";
					
						$queryMessage = "Product Search - by UPC Number: Containing \"".@$_GET['q']."\"";
						
						echo $queryMessage;
						
						break;
				
					case "itemNumber";
				
						$queryMessage = "Product Search - by Item Number: Containing \"".@$_GET['q']."\"";
						
						echo $queryMessage;
						
						break;
					
					case "category";
				
						$queryMessage = "Product Search - by Item Category: Containing \"".@$_GET['q']."\"";
						
						echo $queryMessage;
						
						break;
					
					case "department";
				
						$queryMessage = "Product Search - by Department: Containing \"".@$_GET['q']."\"";
					
						echo $queryMessage;
					
						break;
				
				}
			?>
		</h1>
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
				
				<!--  start message-blue -->
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Your query executed successfully, it returned <b><?php echo $numQueryResultsTotal; ?></b> result<?php if($numQueryResults > 1){ echo "s";}?>. </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue -->
				
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">UPC Number</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Item Number</a></th>
					<th class="table-header-repeat line-left"><a href="">Description</a></th>
					<th class="table-header-repeat line-left"><a href="">Cost</a></th>
					<th class="table-header-repeat line-left"><a href="">Retail</a></th>
					<th class="table-header-options line-left"><a href="">Inventory Value</a></th>
				</tr>
				<?php
				
					$x = 1;
					$currentPage = 1;
					$itemCount = 0;
					
					while($rowTotal = mysql_fetch_array($resultsTotal)){
						
						$itemCount++;
						
						if(is_int($itemCount / (ITEMS_PER_PAGE + 1))){
						
							$currentPage++;
							
							$queryItems[$rowTotal['upcNumber']] = $currentPage;
							
						} else {
						
							$queryItems[$rowTotal['upcNumber']] = $currentPage;
						
						}
						
					}
					
					$i = 0;
					
					while($row = mysql_fetch_array($results)){
					
							if ($i % 2 != 0){ 
							
								$rowClass = "alternate-row";
							
							} else { 
							
								$rowClass = "";
							}
					
				?>
						<tr class="<?php echo $rowClass; ?>">
							<td>
								<input  name="itemSelected" value="<?php echo $row['itemNumber']; ?>" type="checkbox"/>
							</td>
							<td>
								<?php echo $row['itemUPC']; ?>
							</td>
							<td>
								<?php echo $row['itemNumber']; ?>
							</td>
							<td>
								<?php echo $row['itemDescription']; ?>
							</td>
							<td>
								<?php echo $row['itemCost']; ?>
							</td>
							<td>
								<?php echo $row['itemRetail']; ?>
							</td>
							<td class="options-width">
								<?php echo $row['inventoryQuantity']; ?> @ $<?php echo $row['itemRetail']; ?> = $<?php echo $row['inventoryQuantity'] * $row['itemRetail']; ?>
							</td>
						</tr>
						
				<?php
						$i++;
						
					}
					//print_r($queryItems);
				?> 
					
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="search.php?q=<?php echo $searchQuery; ?>&type=<?php echo $searchQueryType; ?>&page=1" class="page-far-left"></a>
				<a href="search.php?q=<?php echo $searchQuery; ?>&type=<?php echo $searchQueryType; ?>&page=<?php if($resultsPage > 1){echo $resultsPage - 1;}else{ echo 1;} ?>" class="page-left"></a>
				<div id="page-info">Page <strong><?php echo $resultsPage; ?></strong> / <?php echo $totalPages; ?></div>
				<a href="search.php?q=<?php echo $searchQuery; ?>&type=<?php echo $searchQueryType; ?>&page=<?php echo $resultsPage + 1; ?>" class="page-right"></a>
				<a href="search.php?q=<?php echo $searchQuery; ?>&type=<?php echo $searchQueryType; ?>&page=<?php echo $totalPages; ?>" class="page-far-right"></a>
			</td>
			<td>
			
			<form name="selectHighlight">
			<select  name="highlight" class="styledselect_pages" onChange="this.form.submit();">
				<option value="1">Select Item:</option>
				<?php
				
				foreach($queryItems as $key => $value){
				
					?>
					
						<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
					
					<?php
					
					$i++;
				}
				?>
			</select>
			</form>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
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
	<!--  start footer-left -->
	<div id="footer-left">
	
	Grocery Management System &copy; Copyright James Sietsma. <span id="spanYear">2011</span> <a href="http://www.jpsietsma.com">jpsietsma.com</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>