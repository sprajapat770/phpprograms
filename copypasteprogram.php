<?php

$file1 = fopen("task1.csv","r");
$file3 = fopen("dataFile.csv","r");

$file2 = fopen("t1_copy.csv","w");

$pibreak = "|";
$commabreak = ",";
$skubreak = "=";


$count =0;

while (($row = fgetcsv($file1)) !== FALSE) {
	$count++;
	
	if ($count == 1) {
		$array = array("sku","name","Products_type","configuration_variations");
		fputcsv($file2, $array);
		continue;
	}

	

	$String = $row[2];
	
	$str="";
	$simpleSkus = array();

	$array = explode("|",$String);
	$items = array($row[0],$row[1],"configurable",$row[2]);
	fputcsv($file2, $items);
	foreach ($array as $key => $value) {
		$Secondpos=strpos($value, $skubreak);
		$Thirdpos=strpos($value, $commabreak);
		$simpleSkus[] =  substr($value , $Secondpos+1, $Thirdpos-$Secondpos-1);	
	}
	sort($simpleSkus);
	foreach ($simpleSkus as $key => $value) {
		$i = 0;
		
		while (($row = fgetcsv($file3)) !== FALSE) {
			$i++;
			if ($i == 1) {
				continue;
			}
			
		$items = array($value,"","simple","");
		fputcsv($file2, $items);
	}
		
}		



fclose($file1);
fclose($file2);
?>