<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db('grocery') or die(mysql_error());
$tableFields = mysql_list_fields('grocery', 'products');
$numFields = mysql_num_fields($tableFields);
$tableName = "products";
$recordPosition = 0;

while($recordPosition < $numFields){
$fieldName = mysql_field_name($tableFields, $recordPosition);


$fields[] = $fieldName;

switch($fields){
case 'itemNumber';



}

$recordPosition++;
}
print_r($fields);
?>
<select  name="type" class="styledselect">
	<option value="select">Fields:</option>
	<option value="itemNumber">Item Number</option>
	<option value="itemUPC">UPC Number</option>
	<option value="itemDepartment">Department</option>
	<option value="itemCategory">Category</option>
</select> 