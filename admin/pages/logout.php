<?php
   include("session.php");
if(isset($_SESSION['admin'])){
	 
	unset($_SESSION['admin']);
    session_destroy();
	
}

header("location: index.php");
?>

