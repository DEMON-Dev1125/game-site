<?php 
$file = $_GET["file"].".exe"; 

header("Content-Type: application/exe"); 
header("Content-Disposition: attachment; filename=" . urlencode($file)); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
readfile(urlencode($file));

exit();



?> 