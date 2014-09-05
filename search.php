<?php

session_start();

if(!isset($_SESSION['username'])){
	header("location: scripts/login.php");
} else {

include('header.php'); 

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
$mysqlQuery = "SELECT * FROM `items` WHERE `$searchQueryType` LIKE '%$searchQuery%' LIMIT $limitStart, $limitEnd";
$mysqlQueryTotal = "SELECT * FROM items WHERE `$searchQueryType` LIKE '%$searchQuery%'";
$resultsTotal = mysql_query($mysqlQueryTotal) or die(mysql_error());
$results = mysql_query($mysqlQuery) or die(mysql_error());
$numQueryResultsTotal = mysql_num_rows($resultsTotal);
$numQueryResults = mysql_num_rows($results);
$totalPages = ceil($numQueryResultsTotal/ITEMS_PER_PAGE);
$totalRows = mysql_num_rows($resultsTotal);
GLOBAL $queryItems;

?>
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
					
					case "itemCategory";
				
						$queryMessage = "Product Search - by Item Category: Containing \"".@$_GET['q']."\"";
						
						echo $queryMessage;
						
						break;
					
					case "itemDepartment";
				
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
							
							$queryItems[$rowTotal['itemUPC']] = $currentPage;
							
						} else {
						
							$queryItems[$rowTotal['itemUPC']] = $currentPage;
						
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
								<a href="viewItem.php?upc=<?php echo $row['itemUPC']; ?>"><?php echo $row['itemUPC']; ?></a>
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
								<?php echo $row['itemInventoryQuantity']; ?> @ $<?php echo $row['itemCost']; ?> = $<?php echo $row['itemInventoryQuantity'] * $row['itemCost']; ?>
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
<?php include('footer.php'); ?>
<!-- end footer -->
 
</body>
</html>
<?php
}
?>