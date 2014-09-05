<?php
if($_POST['submit']){
	header("Location: dashboard.php");
	
} else {
?>
<html>
<head>
<link rel="stylesheet" media="screen" href="style.css" />
</head>
<body>
<h1>Mobiscan Inventory Tool</h1>
<h2>System Login</h2>
<br>
<form id="taskentry" action="login.php" method="post">
<ul>
<li><input type="text" name="employeeID" id="taskname" placeholder="Employee ID"/></li>
<li><input type="password" name="Password" id="taskdesc" placeholder="Password" rows="5" /></li>
<li class="naked"><input type="submit" name="submit" value="Log In" /></li>
</ul>
</form>
</body>
</html>
<?php
}
?>