<?php
$categoryTitle = "heii/ hidv/isb/shjdb / jbdf";
$needle = "/";
//$last = strrpos($haystack, $needle);
//echo $next_to_last = strrpos($haystack, $needle, $last - strlen($haystack) - 1);
$last = strrpos($categoryTitle, "/");

$next_to_last = strrpos($categoryTitle, "/", $last - strlen($categoryTitle) - 1);
$mainCat = substr($categoryTitle,0,$last);
echo  substr($mainCat,$next_to_last+1);

//list($beg, $end) = preg_split('/(?<=.{'.$next_to_last.'})/', $categoryTitle, 2);

//echo "$beg - $end";

/*$Secondpos=strpos($value, $skubreak);
$Thirdpos=strpos($value, $commabreak);

echo $str = $str.substr($value , $Secondpos+1, $Thirdpos-1-$Secondpos).", ";	
*/