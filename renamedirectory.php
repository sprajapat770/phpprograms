<?php

$Directory = '/var/www/html/jspractice/Hello+ Suraj/';



function reNameFile($Directory){
    
    if ($handle = opendir($Directory)) {
        $dir = $Directory;
        
        while (false !== ($fileName = readdir($handle))) {

                if ($fileName == '.' || $fileName == '..') {
                    continue;
                }  
                
                $name = $dir.$fileName;
        
                if(is_dir($name)) reNameFile($name."/");
            
                $newName = str_replace(" ","",$fileName);
                echo $newName2 = str_replace("+","_plus_",$newName);
                rename($dir.$fileName, $dir.$newName2);
        }  
        closedir($handle);
    }
}

reNameFile($Directory);

?>