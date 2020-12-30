<?php include("session.php"); ?>
<!DOCTYPE html>

<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/font_awesome.js"></script> 
  </head>
<body>
	 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <img class="logo_img" src="download_image/onlinepng.png">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
       
      <ul class="navbar-nav">
        
  <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
      </ul>
       
    </div> 
    
    <?php 
    if(isset( $_SESSION['login_email'])){ ?>
      <a href="#" class="sess">
        <?php echo $active = $_SESSION['login_email'];?>
      </a>
      <a href="logout.php">
       <i class='fas fa-sign-out-alt' style="float: right;"></i>
     </a>

   <?php } else{ ?>
<ul class="navbar-nav collapse righttnav">
    
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">Sign Up</a>
        </li>

      </ul>
 <?php  }?>  
 </nav>