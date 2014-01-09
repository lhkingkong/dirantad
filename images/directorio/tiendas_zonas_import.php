<?php
require("includes/connect.php");

$fp = fopen('import.txt', 'w');

$file_handle = fopen("tiendas_m2_zonas-IPSIGHT.csv", "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   echo $line;
   echo "<br>";
   $champs = explode(";", $line);
  $razon_social = $champs[2]; 
    echo $razon_social;
   echo " : ";  
$query = "SELECT asociado_id FROM asociados WHERE razon_social = '$razon_social'";
$result = mysql_query($query);   
//echo $query;

$ident = mysql_fetch_row($result);
//echo $ident[0];

   echo "<br>";  
$newline = "0;".$champs[1].";".$ident[0].";".$champs[3].";".$champs[4];
   echo "<br>";  
echo $newline;
   echo "<br>";  
fwrite($fp, $newline);


}
fclose($file_handle);
fclose($fp);


?>

