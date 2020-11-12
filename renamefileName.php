<?php

$Directory = '/var/www/html/php/test/';

function reNameFile($Directory){
    
    $count = 0;
    if ($handle = opendir($Directory)) {
        $dir = $Directory;
        while (false !== ($fileName = readdir($handle))) {

                if ($fileName == '.' || $fileName == '..') {
                    continue;
                }  
                
                $name = $dir.$fileName;
        
                if(is_dir($name)) reNameFile($name."/");
            
                $newName = str_replace(" ","",$fileName);
                $newName2 = str_replace("+","_plus_",$newName);
                
                
                 if(file_exists($dir.$newName2))
		        {
		        	$count ++;
		        	$nameOfFile = pathinfo($newName2, PATHINFO_FILENAME);
					$ext  = pathinfo($newName2, PATHINFO_EXTENSION);
		        	$newName2 = $nameOfFile.$count.$ext;

		        }else{
					echo "fileName Not Exists";
		        }
                rename($dir.$fileName, $dir.$newName2);
        }  
        closedir($handle);
    }
}

reNameFile($Directory);

?>