<?php
require('db.php');

/**
* Adding News for Demo request by applying check on addnews POST parameter
**/

if(isset($_POST['addnews'])){
	$itemNumber = filter_input(INPUT_POST, 'itemNumber', FILTER_SANITIZE_SPECIAL_CHARS);
	$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_SPECIAL_CHARS);
	$sql = "INSERT INTO active_inventory (itemNumber, quantity, date) VALUES ('".$itemNumber."', '".$quantity."', '".date('Y-m-d H:i:s')."')";
	mysql_query($sql);
	
}
/**
* Preparing and getting response for latest feed items.
**/
if(isset($_POST['latest_news_time'])){
	$sql = "SELECT * FROM active_inventory WHERE date > '".$_POST['latest_news_time']."' ORDER BY date DESC";
	$resource = mysql_query($sql);
	$current_time = $_POST['latest_news_time'];
	$item = mysql_fetch_assoc($resource);
	$last_news_time = $item['date'];
	while ($last_news_time < $current_time) {
		usleep(1000); //giving some rest to CPU
		$resource = mysql_query($sql);
		$item = mysql_fetch_assoc($resource);
		$last_news_time = $item['date'];
	}
	$itemNumber = $item['itemNumber'];
	$itemInfo = mysql_query("SELECT * FROM items WHERE itemNumber = $itemNumber ") or die(mysql_error());
	$itemInfo = mysql_fetch_assoc($itemInfo);
	?>
	<li id="<?php echo $item['date'] ?>">
		<span class="feedtext"><div style="text-align: center; width: 100%;"><input value="<?php echo $item['itemNumber']; ?>" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="height: 35px; display: inline-block; width: 100px; border: 1px dashed black;"><?php echo $item['itemNumber'] ?></div> <div style="height: 35px; display: inline-block; width: 195px; border: 1px dashed black;"><?php if($itemInfo1 = null){ echo "Item doesn't exist!"; }else{echo $itemInfo['itemDescription']; } ?></div>&nbsp;<div style="height: 35px; display: inline-block; width: 195px; border: 1px dashed black;"><?php echo $itemInfo['itemUPC'] ?></div>&nbsp;<div style="height: 35px; display: inline-block;  width: 195px; border: 1px dashed black;"><?php echo $itemInfo['itemCost']; ?></div>&nbsp;<div style="height: 35px; display: inline-block; width: 195px; border: 1px dashed black;"><img style="vertical-align: -10px;" src="images/icons/red_down_arrow.png" height="20" width="20" title="Subtract Qty" />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['quantity']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<img style="vertical-align: -10px;" src="images/icons/green_up_arrow.png" height="20" width="20" title="Add Qty" /></div>&nbsp;<div style="height: 35px; display: inline-block; width: 175px; border: 1px dashed black;"><?php echo $item['quantity']*$itemInfo['itemCost']; ?></div><div style="vertical-align: -10px; height: 35px; display: inline-block; width: 120px; border: 0px dashed black;">&nbsp;&nbsp;<img src="images/icons/blue_gear_edit.png" height="22" width="22" title="Edit Entry" />&nbsp;&nbsp;<img src="images/icons/red_minus_delete.png" height="20" width="20" title="Subtract Qty" />&nbsp;&nbsp;<img src="images/icons/green_plus_add.png" height="20" width="20" title="Add Qty" />&nbsp;&nbsp;<a href="action.php?action=remove&id=<?php echo $item['date']; ?>&upc=<?php echo $itemInfo['itemUPC']; ?>&qty=<?php echo "<u>" . $item['quantity'] . "</u><i> " . $itemInfo['itemDescription'] . "</i> <b>@</b> <u>" . $itemInfo['itemCost'] . "</u>/ea"; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $item['quantity'] . " " . $itemInfo['itemDescription'] . " @ " . $itemInfo['itemCost'] . "/ea"; ?>?');"><img src="images/icons/red_x_remove.png" height="20" width="20" title="Remove Entry" /></a></div></span>
	</li>
	<?php
	exit;
}
/**
* Getting news Items and preparing sql query with respect to request
**/
$sql = "SELECT * FROM active_inventory ORDER BY date DESC LIMIT 0, 10";
if(isset($_POST['last_time'])){
	$sql = "SELECT * FROM active_inventory WHERE date < '".$_POST['last_time']."' ORDER BY date DESC LIMIT 0, 10";
}
$resource = mysql_query($sql);
$news = array();
while($row = mysql_fetch_assoc($resource)){
	$news[] = $row;
}

?>
<html>
<head>
<title>G.M.S. | Active Inventory</title>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/scroll-pagination.js" type="text/javascript"></script>
	<script src="js/slimScroll.js" type="text/javascript"></script>
	<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
$(function(){
	/**
	* Integrating slim scroll
	**/
	$("#feeds ul").slimScroll({
        height: '520px'
    });
	/**
	* Integrating Scroll Pagination
	**/
	var feeds = $("#feeds ul");
	var last_time = feeds.children().last().attr('id');
    feeds.scrollFeedPagination({
        'contentPage': 'index.php',
        'contentData': {
            'last_time' : last_time
        },
        'scrollTarget': feeds, 
        'beforeLoad': function(){
            feeds.parents('#feeds').find('.loading').fadeIn();
        },
        'afterLoad': function(elementsLoaded){
            last_time = feeds.children().last().attr('id');
            feeds.scrollFeedPagination.defaults.contentData.last_time = last_time;
            feeds.parents('#feeds').find('.loading').fadeOut();
            var i = 1;
            $(elementsLoaded).fadeInWithDelay();
        }
    });
    $.fn.fadeInWithDelay = function(){
        var delay = 0;
        return this.each(function(){
            $(this).delay(delay).animate({
                opacity:1
            }, 200);
            delay += 100;
        });
    };
	//calling the function to update news feed
    setTimeout('updateFeed()', 1000);
});
/**
* Function to update the news feed
**/
function updateFeed(){
		var id = 0;
		id = $('#feeds li :first').attr('id');
        $.ajax({
            'url' : 'index.php',
            'type' : 'POST',
            'data' : {
                'latest_news_time' : id  
            },
            success : function(data){
				setTimeout('updateFeed()', 1000);
				if(id != 0){
                	$(data).prependTo("#feeds ul");
				}
            }
        }) 
	}
</script>
<body>
	<div class="main_container">
	<div class="form">
			<form action="" id="add-news-form" method="post">
				<b>Item Number</b>: <input name="itemNumber" id="news" type="text" />&nbsp;&nbsp;&nbsp;<b>Quantity</b>: <input name="quantity" id="name" type="text" />&nbsp;&nbsp;&nbsp;<input type="button" onclick="addNews()" value="Add Item" />
			</form>
		</div><br><br style="clear: both">
		<div class="feeds_container">
			<h3 class="feed_head"><table><tr><td style="width: 50px;"></td><td class="feed_head_header_itemNumber">Item #</td><td class="feed_head_header">Description</td><td class="feed_head_header">UPC Code</td><td class="feed_head_header">Cost</td><td class="feed_head_header">Inventory Qty.</td><td class="feed_head_header">Ext. Cost</td><td class="feed_head_header_action">Actions</td></tr></table></h3>
			<div id="feeds" class="feeds">
				<ul>
					<?php foreach($news as $item): ?>
					<?php 
					$itemNumber = $item['itemNumber'];
					$itemInfo1 = mysql_query("SELECT * FROM items WHERE itemNumber = $itemNumber ") or die(mysql_error());
					$itemInfo = mysql_fetch_assoc($itemInfo1);
					
					?>
					<li id="<?php echo $item['date'] ?>">
						<span class="feedtext"><div style="text-align: center; width: 100%;"><input value="<?php echo $item['itemNumber']; ?>" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="height: 35px; display: inline-block; width: 100px; border: 1px dashed black;"><?php echo $item['itemNumber'] ?></div> <div style="height: 35px; display: inline-block; width: 195px; border: 1px dashed black;"><?php if($itemInfo1 = null){ echo "Item doesn't exist!"; }else{echo $itemInfo['itemDescription']; } ?></div>&nbsp;<div style="height: 35px; display: inline-block; width: 195px; border: 1px dashed black;"><?php echo $itemInfo['itemUPC'] ?></div>&nbsp;<div style="height: 35px; display: inline-block;  width: 195px; border: 1px dashed black;"><?php echo $itemInfo['itemCost']; ?></div>&nbsp;<div style="height: 35px; display: inline-block; width: 195px; border: 1px dashed black;"><img style="vertical-align: -10px;" src="images/icons/red_down_arrow.png" height="20" width="20" title="Subtract Qty" />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['quantity']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<img style="vertical-align: -10px;" src="images/icons/green_up_arrow.png" height="20" width="20" title="Add Qty" /></div>&nbsp;<div style="height: 35px; display: inline-block; width: 175px; border: 1px dashed black;"><?php echo $item['quantity']*$itemInfo['itemCost']; ?></div><div style="vertical-align: -10px; height: 35px; display: inline-block; width: 120px; border: 0px dashed black;">&nbsp;&nbsp;<img src="images/icons/blue_gear_edit.png" height="22" width="22" title="Edit Entry" />&nbsp;&nbsp;<img src="images/icons/red_minus_delete.png" height="20" width="20" title="Subtract Qty" />&nbsp;&nbsp;<img src="images/icons/green_plus_add.png" height="20" width="20" title="Add Qty" />&nbsp;&nbsp;<a href="action.php?action=remove&id=<?php echo $item['date']; ?>&upc=<?php echo $itemInfo['itemUPC']; ?>&qty=<?php echo "<u>" . $item['quantity'] . "</u><i> " . $itemInfo['itemDescription'] . "</i> <b>@</b> <u>" . $itemInfo['itemCost'] . "</u>/ea"; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $item['quantity'] . " " . $itemInfo['itemDescription'] . " @ " . $itemInfo['itemCost'] . "/ea"; ?>?');"><img src="images/icons/red_x_remove.png" height="20" width="20" title="Remove Entry" /></a></div></span>
					</li>
					<?php endforeach; ?>
				</ul>
				<div class="loading">
					<img src="images/loading_transparent.gif"  alt=""/>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
/**
* Function to add news
**/
function addNews(){
	var validation = "";
	var values = {};
	$.each($('#add-news-form').serializeArray(), function(i, field) {
        if((field.value == 0)){
            validation = "false";
        }
        values[field.name] = field.value;
    });
	if(validation == "false"){
		alert("Quantity and Item Number are required Values");
		return false;
	}
	values['addnews'] = '';
	$.ajax({
        'url' : '',
        'type' : 'POST',
        'data' : values,
        success : function(data){
			
        }
    }) 
}
</script>