<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery");
?>
<html>
<body>

<form action="test.php" method="post">
<input type="text" name="text" value="Enter data here" /><br>
<input type="password" name="password" value="enter password" /><br>
<input type="submit" name="submit" value="Go!" />
</form>
<br><br><br><br><br>
<?php
$password = @$_POST['password'];

if(@$_POST['submit']){

mysql_query("INSERT INTO `test` (`message`) VALUES ('$password')") or die(mysql_error());

}
?>
</body>
</html>