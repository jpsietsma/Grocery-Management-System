<?php
session_start();
$q = $_GET['q'];

mysql_connect('localhost','root','') or die(mysql_error());

mysql_select_db("grocery") or die(mysql_error());

$result = mysql_query("SELECT * FROM vendors WHERE vendID = '$q' ") or die(mysql_error());

while($row = mysql_fetch_array($result))
  {
  echo "<img style='float: left; margin-left: 230px;' src='" . $row['vend_logo'] . "' height='250px' width='400px' />
	   <table border='1' style='float: right; margin-right: 100px; font-size: 13px; color: black; height: 250px; width: 400px;'>
       <tr>
       <th>Vendor ID: </th><td>" . $row['vendID'] . "</td></tr><tr>";
  echo "<th>Vendor Name: </th><td>" . $row['vendName'] . "</td></tr><tr>";
  echo "<th>Vendor Address: </th><td>" . $row['vend_address_street'] . "<br>" . $row['vend_address_city'] . ", ". $row['vend_address_state'] . " " . $row['vend_address_zip'] . "</td></tr><tr>";
  echo "<th>Vendor Phone: </th><td>" . $row['vend_phone'] . "</td></tr><tr>";
  echo "<th>Vendor Fax: </th><td>" . $row['vend_fax'] . "</td></tr><tr>";
  echo "<th>Salesman Contact: </th><td>" . $row['vend_salesman'] . "</td></tr><tr>";
  echo "<th>Salesman Phone: </th><td>" . $row['vend_salesman_phone'] . "</td></tr><tr>";
  echo "<th>Salesman Email: </th><td>" . $row['vend_salesman_email'] . "</td></tr></tr>";
  echo "</table>";
}
?>