<?php


$String  = "sku=C-CP711,concealer_pot=C711 Medium Light Porcelain|sku=C-CP700,concealer_pot=C700 Extra Light Porcelain|sku=C-CP753,concealer_pot=C753 Medium Tan|sku=C-CP705,concealer_pot=C705 Mocha|sku=C-CP710,concealer_pot=C710 Cognac|sku=C-CP752,concealer_pot=C752 Medium Ivory|sku=C-CP704,concealer_pot=C704 Dark Tan|sku=C-CP757,concealer_pot=C757 Honey Chesnut|sku=C-CP709,concealer_pot=C709 Amber|sku=C-CP751,concealer_pot=C751 Ivory|sku=C-CP703,concealer_pot=C703 Medium Beige|sku=C-CP756,concealer_pot=C756 Golden Honey|sku=C-CP708,concealer_pot=C708 Coffee Bean|sku=C-CP750,concealer_pot=C750 Light Ivory|sku=C-CP702,concealer_pot=C702 Porcelain|sku=C-CP755,concealer_pot=C755 Almond|sku=C-CP707,concealer_pot=C707 Caramel|sku=C-CP712,concealer_pot=C712 Medium Porcelain|sku=C-CP701,concealer_pot=C701 Light Porcelain|sku=C-CP754,concealer_pot=C754 Tan|sku=C-CP706,concealer_pot=C706 Ebony
";


$length = strlen($String);
$skubreak = "=";
$commabreak = ",";


$array = explode("|",$String);
$skus = array();
$str="";
foreach ($array as $key => $value) {
    $Secondpos=strpos($value, $skubreak);
	$Thirdpos=strpos($value, $commabreak);
echo $str = $str.substr($value , $Secondpos+1, $Thirdpos-1-$Secondpos).", ";	

	//$skus[] =  substr($value , $Secondpos+1, $Thirdpos-$Secondpos-1);
	
}
echo "</br>";
print_r($skus);

?>