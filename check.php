<?php

$file1 = fopen("simple_product_list.csv","r");
$file2 = fopen("extracted_attributes_list.csv","r");

$file3 = fopen("difference.csv","w");
$count =0;
$skulist = array();
$skulist02 = array();

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
	if ($count == 1) {
		continue;
	}
	$skulist02[] = $row[0]; 
}

$result=array_diff($skulist,$skulist02);
//echo $result;
print_r($result);
fputcsv($file3, $result);

fclose($file1);
fclose($file2);
fclose($file3);


?>