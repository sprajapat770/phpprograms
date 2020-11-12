<?php

$file1 = fopen("config_list.csv","r");
$file2 = fopen("all_products_list.csv","r");
$file3 = fopen("extracted_conf_attributes_list.csv","w");


$count =0;
$skulist = array();


while (($row = fgetcsv($file1)) !== FALSE) {
	$count++;
	if ($count == 1) {
		continue;
	}
	$skulist[] = $row[0]; 
}

$count = 0;
while (($row = fgetcsv($file2)) !== FALSE) {
	$count++;

	if ($count==1) {
		$header = $row;
		fputcsv($file3, $row);
		continue;
	}

	foreach ($skulist as $value) {
		if ($value == $row[0]) {	
			fputcsv($file3, $row);
			}
		}	
	}

fclose($file1);
fclose($file2);
fclose($file3);

?>