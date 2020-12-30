<?php
   include("session.php");
if(isset($_SESSION['login_email'])){
	  $_SESSION['login_email'];

	session_start();
    session_destroy();
	
}

header("location: index.php");
?>

