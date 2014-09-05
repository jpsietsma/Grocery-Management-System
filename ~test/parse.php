<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("grocery") or die(mysql_error());

$pricebookFile = "../pricebooks/".@$_GET['pb'].".txt";
$pricebookContents = file($pricebookFile);
$pricebookPages = 0;
$pricebookItems = 0;
$pricebookDept = null;
$pricebookCat = null;
$pricebookGrp = null;

foreach($pricebookContents as $key => $value){
$product['Item'] = null;
$product['UPC'] = null;
$product['Description'] = null;
$product['Pack'] = null;
$product['Size'] = null;
$product['State'] = null;
$product['Retail'] = null;
$product['Date'] = null;
$product['Cost'] = null;
$product['Allowance'] = null;
$product['Markup'] = null;
$product['Department'] = $pricebookDept;
$product['Category'] = $pricebookCat;
$product['Group'] = $pricebookGrp;
$product['Pricebook'] = null;
$product['PricebookPage'] = $pricebookPages;

$trimmedValue = ltrim(chop(strip_tags($value)));

$explodedLine = explode(' ', $trimmedValue);

$pieceOne = $explodedLine[0];
$pieceTwo = $explodedLine[1];
$pieceThree = $explodedLine[2];
$pieceFour = $explodedLine[3];
$pieceFive = $explodedLine[4];
$pieceSix = $explodedLine[5];

if($pieceOne == "PAGE"){
 
 $pricebookPages++;
 
 } else if ($pieceOne == "SCAN"){
 
	$explodedPiece = explode('-', $pieceThree);
	
	$pricebookDept = $explodedPiece[0];
	
	$pricebookCat = $explodedPiece[1];
	
	$pricebookGrp = $explodedPiece[2];
 
 } else if (($pieceOne == "WHOLESALE") OR ($pieceOne == "STORE") OR ($pieceOne == "FOCUS") OR ($pieceOne == "RETL") OR ($pieceOne == "ITEM") OR ($pieceOne == "----") OR (count($explodedLine) == 1) OR (strlen($pieceOne) > 5)){

}else{
			
				$product['Item'] = $explodedLine[0];
				array_shift($explodedLine);
				$product['UPC'] = $explodedLine[0];
				array_shift($explodedLine);
				$explodedLine = array_reverse($explodedLine);
				$product['Markup'] = $explodedLine[0];
				array_shift($explodedLine);
				$product['Allowance'] = $explodedLine[2];
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				$product['Cost'] = $explodedLine[2];
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				$product['Date'] = $explodedLine[0];
				array_shift($explodedLine);
				$product['Retail'] = $explodedLine[0];
				array_shift($explodedLine);
				
				if($explodedLine[3] == "/") {
				
					$product['Retail'] = ($product['Retail']/$explodedLine[4]);
					array_shift($explodedLine);
					array_shift($explodedLine);
					array_shift($explodedLine);
					array_shift($explodedLine);
					array_shift($explodedLine);
					array_shift($explodedLine);
					$product['State'] = $explodedLine[0];
				
				} else if(strlen($product['Retail']) >= 5){
				
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);	
				
				}else{
				
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);
				array_shift($explodedLine);			

				}
				
				$product['State'] = $explodedLine[0];
				array_shift($explodedLine);
				$product['Size'] = $explodedLine[1]." ".$explodedLine[0];
				array_shift($explodedLine);
				array_shift($explodedLine);
				$trimmed = ltrim(chop(implode(' ', $explodedLine)));
				$explodedLine = explode(' ', $trimmed);
				$product['Pack'] = $explodedLine[0];
				array_shift($explodedLine);
				$trimmed = ltrim(chop(implode(' ', $explodedLine)));
				$explodedLine = explode(' ', $trimmed);
				$explodedLine = array_reverse($explodedLine);
				array_reverse($explodedLine);
				$explodedLine = implode(' ', $explodedLine);
				str_replace("`", '_', $explodedLine);
				$product['Description'] = addslashes($explodedLine);
				
				
				//print_r($explodedLine);
				//print_r($product);
				$query = "INSERT INTO  `grocery`.`items` (
`itemNumber` ,
`itemUPC` ,
`itemDescription` ,
`itemPack` ,
`itemSize` ,
`itemState` ,
`itemRetail` ,
`retailDate` ,
`itemCost` ,
`itemAllowance` ,
`generalMarkup` ,
`itemDepartment` ,
`itemCategory` ,
`itemGroup` ,
`pricebookName` ,
`pricebookPage`
)
VALUES ('$product[Item]',  '$product[UPC]',  '$product[Description]',  '$product[Pack]',  '$product[Size]',  '$product[State]',  '$product[Retail]',  '$product[Date]',  '$product[Cost]',  '$product[Allowance]', '$product[Markup]',  '$product[Department]',  '$product[Category]',  '$product[Group]',  '$product[Pricebook]',  '$product[PricebookPage]')";
				mysql_query("$query") or die(mysql_error());
				
				$pricebookItems++;
		
}
}
?>
</tr>
<tr colspan="3"><td colspan="1"><b>Total Pages:</b></td><td colspan="2"><?php echo $pricebookPages; ?></td></tr>
<tr colspan="3"><td colspan="1"><b>Total Items:</b></td><td colspan="2"><?php echo $pricebookItems; ?></td></tr>
</table>