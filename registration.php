<?php
 include("admin/pages/database.php");
 include("session.php");
$emailErr = $passwordErr =  $RePasswordErr= $fnameErr = $mobileErr = "";
$email = $password =$RePassword = $fname = $mobile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["fname"])) {
    $fnameErr = "Name is Required";
  } else {
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is Required";
  } else {
    $email = test_input($_POST["email"]);
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is Required";
  } else {
    $password = test_input($_POST["password"]);
  }

   if (empty($_POST["rpassword"])) {
    $RePasswordErr = "Re-Password is Required";
  }
  else {
    $RePassword = test_input($_POST["rpassword"]);
  }
  if (!empty($password) && !empty($RePassword) && $password != $RePassword) {
    $RePasswordErr = "Password Not Matched";
  }

  if (empty($_POST["mobile"])) {
    $mobileErr = "Mobile number is Required";
  } else {
    $mobile = test_input($_POST["mobile"]);
  }
  if(!empty($mobile)) // phone number is not empty
{
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $mobile))
    {
     $mobileErr = 'mobile number invalid !';
    }
   
}

 if(!empty($email) && !empty($password)  && !empty($RePassword) && !empty($fname) && !empty($mobile)){
      // Attempt insert query execution
    $sql = "INSERT INTO register_users (name, email, password, mobile) VALUES ('".$fname."', '".$email."','".$password."','".$mobile."')";
    if(mysqli_query($db, $sql)){
        echo "Records inserted successfully.";
          header("location:login.php");
    } else{
         header("location:registation.php");
    }

    }

   
   }

   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

 <style type="text/css">
  .error {color: #FF0000;}
</style>

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
<body class="hold-transition login-page col-md-4 col-sm-6 col-8 offset-md-4 offset-sm-3 offset-2">
  <div class="conrainer">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h4"><b>SIGN UP</b></a>
    </div>
    <div class="card-body">
   

      <form  method="post">
         <span class="error">* <?php echo $fnameErr;?></span>
        <div class="input-group mb-3">
          <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="error">* <?php echo $emailErr;?></span>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" value="<?php echo $email;?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="error">* <?php echo $passwordErr;?></span>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" value="<?php echo $password;?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="error">* <?php echo $RePasswordErr;?></span>
        <div class="input-group mb-3">
          <input type="password" name="rpassword" class="form-control" value="<?php echo $RePassword;?>" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="error">* <?php echo $mobileErr;?></span>
        <div class="input-group mb-3">
          <input type="text" name="mobile" class="form-control mobile"  value="<?php echo $mobile;?>" placeholder="xxx-xxxx-xxxx" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" name="agreeTerms" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

</div>
</body>

</html>
<style type="text/css">
  .card-primary.card-outline {
    border-top: 3px solid #007bff;
}
</style>
