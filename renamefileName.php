<?php

$Directory = 'Photos Promotools_final/';


if ($handle = opendir($Directory)) {
    echo $handle;
    while (false !== ($fileName = readdir($handle))) {
    	if ($handle2 = opendir($Directory.$fileName."/")) {
    		
   			while (false !== ($fileName2 = readdir($handle2))) {
    			echo $fileName2;
        	//$newName22 = str_replace(" ","",$fileName2);
    		//echo " ";
        	//echo $newName23 = str_replace("+","_plus_",$newName22);
        	//rename('Photos Promotools_final/'.$fileName, "Photos Promotools_final/".$newName2);
    		}
    	}
	    	echo $fileName;
	        $newName = str_replace(" ","",$fileName);
	        //echo " ";
	        //echo $newName2 = str_replace("+","_plus_",$newName);
	        //echo "\n";*/
		closedir($handle);
	      //  rename("Photos Promotools_final/".$fileName, "Photos Promotools_final/".$newName2);
    }
    closedir($handle);
}



?>