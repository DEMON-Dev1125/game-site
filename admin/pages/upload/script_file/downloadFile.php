<?php 
$file = $_GET["file"];

header("Content-Type: application/mp4"); 
header("Content-Disposition: attachment; filename=" . urlencode($file)); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
readfile(urlencode($file));

exit();



?> 