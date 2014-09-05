<?php
include('class.googleVoice.php');

$gv=new GoogleVoice('jpsietsma','A!12@lop^6');

if(@$_POST['send']){

	$gv->sms('$_POST[number]', '$_POST[message]');

} else {
?>

<html>
<head>
<title>Send Text Message</title>
</head>

<body>
<form action="gv.php" method="post" />
<input type="text" name="number" value="" /><br>
<input type="text" name="message" value="" />
<input type="submit" name="send" value="Send" />
</form>
</body>

</html>

<?php
}
?>