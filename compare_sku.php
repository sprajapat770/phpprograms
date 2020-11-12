<?php

$file1 = fopen("file1.csv","r");
$file2 = fopen("file2.csv","r");
$file3 = fopen("file3.csv","w");

$count =0;

$sku_file_02 = array();

$sku_file_01 = array();

while (($row = fgetcsv($file2)) !== FALSE) {
	$count++;
	
	if ($count == 1) {
		
		continue;
	}
	$sku_file_02[] = $row[0]; 
}

$count = 0;
while (($row = fgetcsv($file1)) !== FALSE) {
	$count++;
	
	if ($count == 1) {
		
		continue;
	}
	$sku_file_01[] = $row[0]; 
}

$result=array_diff($sku_file_01,$sku_file_02);
//print_r($result);
$count = 0;

$file1 = fopen("file1.csv","r");
while (($row = fgetcsv($file1)) !== FALSE) {
	$count++;
	
	$header = array("sku","description","short_description");
	if ($count == 1) {
		fputcsv($file3, $header);
		continue;
	}
//echo $row[0];
	foreach ($result as $key => $value) {
//		echo $value."</br>";
		if ($value == $row[0]) {
			if ($row[1]!= '' || $row[2]!= '' ) {
				fputcsv($file3, $row);
			}

		}
	
	}
}

fclose($file1);
fclose($file2);
fclose($file3);

?>