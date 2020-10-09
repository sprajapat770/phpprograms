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
	//print_r($skus1);
//print_r($names);
$count = 0;

while (($row = fgetcsv($file2)) !== FALSE) {
	$count++;
	if ($count == 1) {
		$array = array("sku","name","Products_type");
		fputcsv($file3, $array);
		continue;
	}
	//print_r($names);
	foreach ($skus1 as $key => $value) {
		// /echo $value." ".$names[$key]."</br>";
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