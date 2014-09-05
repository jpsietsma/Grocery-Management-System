<?php
$a = (isset($_GET['a'])) ? $_GET['a'] : "n";
switch($a){
case ($a == 'n');
$n = "10.0.1.125";
$r = 1;
$command = "fing -".$a." ".$n."/24 -r ".$r." -o table,html,discoveryResults.html -o log,csv,discoveryResults.csv";
break;

case ($a == 'p');
$n = "10.0.1.125";

$command = "fing -p ".$n." -o table,html,pingResults.html";
break;

}

exec($command, $resultsArrayHtml, $value);

switch($a){
case ($a == 'n');
$contents = file_get_contents("discoveryResults.html");
$explode = explode("<tr>", $contents);
array_shift($explode);
array_shift($explode);
array_pop($explode);
unlink("./discoveryResults.html");
break;

case ($a == 'p');
$contents = file_get_contents("pingResults.html");
$explode = explode("<tr>", $contents);

break;

}

?>
<html>
<head>
<STYLE>
BODY { FONT-SIZE: 12px; FONT-FAMILY: Tahoma }
STRONG { COLOR: dimgray; FONT-FAMILY: Tahoma }
TD { FONT-SIZE: 11px; FONT-FAMILY: Tahoma; COLOR: black}
A { FONT-SIZE: 11px; COLOR: darkslategray; FONT-FAMILY: Tahoma; TEXT-DECORATION: none }
#UP { }
#DOWN { background: #FFBBBB }
.HEADER { width: 100%; FONT-SIZE: 12px;}
.DISCOVERY { width: 100%; border: 0px; background: gray; border-collapse: separate; border-spacing: 1px; *border-collapse: expression('separate', cellSpacing = '1px');}
.DISCOVERY TR { background: white }
.DISCOVERY TH { background: #dadada; FONT-SIZE: 12px}
</STYLE>
</head>
<body>
Results: <br>
<div style="border: 1px solid black"><?php //echo $explode[0]; 
											print_r($explode); ?></div>