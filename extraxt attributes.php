<?php

$file1 = fopen("attributes.csv","r");

$file2 = fopen("artelia_header_.csv","r");

$count =0;
$skulist = array();

while (($row = fgetcsv($file1)) !== FALSE) {
	$count++;
	if ($count == 1) {
		continue;
	}
	$skulist[] = $row[2]; 
}

fputcsv($file2, $skulist);


fclose($file1);
fclose($file2);

?>