<?php
/* parsePB.php
James Sietsma
08/09/2011
*/

	$priceBookFile = "../pricebooks/".$_GET['pb'];	
	
	parsePB($priceBookFile);

	function parsePB($priceBookFile){
		
		if(!is_file($priceBookFile)){
			
			echo "This is not a valid price book file";
			exit();
			
		}
		
		$currentLineData['itemNumber'] = 0;
		$currentLineData['upcNumber'] = 0;
		$currentLineData['description'] = null;
		$currentLineData['casePack'] = 0;
		$currentLineData['productSize'] = null;
		$currentLineData['productState'] = null;
		$currentLineData['retailPrice'] = 0.00;
		$currentLineData['dateIntroduced'] = "0000/00/00";
		$currentLineData['productCost'] = 0.00;
		$currentLineData['productAllow'] = 0.00;
		$currentLineData['productMarkup'] = 00.00;
		
		$priceBookLines = file($priceBookFile);
		print_r($priceBookLines);

		foreach($priceBookLines as $key => $value){
			
			$explodedData = explode(' ', $priceBookLines[$key]);
			
			$currentLineArrayLength = count($explodedData);
				
				//Begin checking values to make sure there is no shift due to missing data
				if(is_numeric($explodedData[0])){
				
					$dataLength = strlen($explodedData[0]);
					 
					if($dataLength = 5){
				
						$currentLineData['itemNumber'] = $explodedData[0];
					
					}
				
				} else {
			
					break;
			
				}
			
				if(is_numeric($explodedData[1])){
			
					$dataLength = strlen($explodedData[1]);
				
					if($dataLength = 11){
					
						$currentLineData['upcNumber'] = $explodedData[1];
					
					}
					
				} else {
			
					break;
				
				}
						
				if(is_numeric($explodedData["$currentLineArrayLength" - 1])){
			
					$currentLineData['productMarkup'] = $explodedData["$currentLineArrayLength" - 1];
				
				}
			
				if(is_numeric($explodedData["$currentLineArrayLength" - 2])){
			
					$currentLineData['productAllow'] = $explodedData["$currentLineArrayLength" - 2];
				
				}
			
				if(is_numeric($explodedData["$currentLineArrayLength" - 3])){
			
					$currentLineData['productCost'] = $explodedData["$currentLineArrayLength" - 3];
				
				}
			
				$currentYear = date("Y");
				$explodedDate = explode('/', $explodedData["$currentLineArrayLength" - 4]);
			
				if($explodedDate[0] <= $currentYear){
				
					if(($explodedDate[1] <= 12) AND ($explodedDate[1] > 0)){
				
						if(($explodedDate[2] <= 31) AND ($explodedDate[2] > 0)){
					
							$currentLineData['dateIntroduced'] = $explodedData["$currentLineArrayLength" - 4];
							
						}
					}
				}
			
				if(is_numeric($explodedData["$currentLineArrayLength" - 5])){
			
					$currentLineData['retailPrice'] = $explodedData["$currentLineArrayLength" - 5];
				
				}
			
				$productStateLength = strlen($explodedData["$currentLineArrayLength" - 6]);
				
				if($productStateLength = 2){
			
					$currentLineData['productState'] = $explodedData["$currentLineArrayLength" - 6];
				
				}
			
				if(is_numeric($explodedData["$currentLineArrayLength" - 7])){
				
					$productSizeLength = 0;
					$currentLineData['productSize'] = $explodedData["$currentLineArrayLength" - 7];
					$currentLineData['casePack'] = $explodedData["$currentLineArrayLength" - 8];
				
				} else {
			
					$productSizeLength = 1;
					$currentLineData['productSize'] = $explodedData["$currentLineArrayLength" - 8]." ".$explodedData["$currentLineArrayLength" - 7];
					$currentLineData['casePack'] = $explodedData["$currentLineArrayLength" - 9];
					
				}
			
				$arrayDescriptionLength = $currentLineArrayLength - 11 + $productSizeLength;
			
				$count = 2;
				$currentLineData['description'] = null;
				while($count <= $arrayDescriptionLength){
					$currentLineData['description'] .= $explodedData[$count]." ";
					
					$count++;
				}
			
				foreach($currentLineData as $key => $value){
			
					echo $key." => ".$value."<br>";
				
				}
				
				echo "<br>";
				unset($currentLineData);
			
		}			
	}
	
?>