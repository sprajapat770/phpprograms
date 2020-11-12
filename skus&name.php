<?php

$file1 = fopen("dataFile.csv","r");
$file2 = fopen("t1_copy.csv","r");
$file3 = fopen("t2_copy.csv","w");

$count =0;

$skus1 = array();
$names = array();

while (($row = fgetcsv($file1)) !== FALSE) {
	$count++;
	
	if ($count == 1) {
		
		continue;
	}
	$skus1[] = $row[0]; 
	$names[] = $row[2];
}

$count = 0;

while (($row = fgetcsv($file2)) !== FALSE) {
	$count++;
	if ($count == 1) {
		$array = array("sku","name","Products_type","configuration_variations");
		fputcsv($file3, $array);
		continue;
	}
	
	$onetime = 0;
	foreach ($skus1 as $key => $value) {
		
		$onetime++;
		if ($row[2]=="configurable" && $onetime == 1) {
		
			$items = array($row[0],$row[1],"configurable",$row[3]);
			fputcsv($file3, $items);
		}
		if ($value == $row[0]){
			$items = array($value,$names[$key],"simple");
			fputcsv($file3, $items);
		}
	}
}

fclose($file1);
fclose($file2);
fclose($file3);

?>