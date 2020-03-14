<?php
    $ironName = $_POST['ironName'];
    $partsArray = $_POST['partsArray'];
    $otherParts = array_slice($partsArray,3);

   $fileName = generateRandomString();

   $configFile = fopen("txt/".$fileName.".txt","w");

   fwrite($configFile, pack("CCC",0xef,0xbb,0xbf)); 

   $line = $ironName."\n";
   fwrite($configFile,$line);

   $line = "\tProcesor:\t\t\t".$partsArray[0]."\n";
   fwrite($configFile,$line);

   $line = "\tKarta Graficzna:\t\t".$partsArray[1]."\n";
   fwrite($configFile,$line);

   $line = "\tPamięć Ram:\t\t\t".$partsArray[2]."\n\n";
   fwrite($configFile,$line);

   $line = "\tPamięć i Dodatki:\t\t";
   fwrite($configFile,$line);

   foreach ($otherParts as $part) {
       $line = $part."\n\t\t\t\t\t";
       fwrite($configFile,$line);
   }
   fclose($configFile);
   echo $fileName;
   exit;

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }