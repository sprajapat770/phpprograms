<?php


$String  = "Default Category/Demo Category/child-1,Default Category/Demo Category/child-2";


$length = strlen($String);
$firstreak = "/";

$array = explode(",",$String);
$categories = array();

foreach ($array as $key => $value) {
		$categories[] =substr(strrchr($value, "/"), 1);
}
echo "</br>";
print_r($categories);

?>