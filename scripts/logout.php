<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery");

session_start();
$username = $_SESSION['username'];
$news = "<b>$username</b> has logged out.";
$name = "System";

session_destroy();
unlink($_session['username']);
unset($_session['username']);

$sql = "INSERT INTO news (description, name, date) VALUES ('".$news."', '".$name."', '".date('Y-m-d H:i:s')."')";
mysql_query($sql);

header("Location: ../index.php");
?>