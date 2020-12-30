<?php 
include("../database.php");

$nameErr = $ShdescErr = $LgdescErr = $categErr = $downloadFileErr = $imageErr = "";
$name = $short_desc = $long_desc = $category = $file = $image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["gamename"])) {
    $nameErr = "required";
  } else {
    $name = test_input($_POST["gamename"]);
  }
  
  if (empty($_POST["short_desc"])) {
    $ShdescErr = "required";
  } else {
    $short_desc = test_input($_POST["short_desc"]);
  }
  if (empty($_POST["long_desc"])) {
    $LgdescErr = "required";
  } else {
    $long_desc = test_input($_POST["long_desc"]);
  }

  if (empty($_POST["category"])) {
    $categErr =  "required";
  } else {
    $category = test_input($_POST["category"]);
  }

  if (empty($_FILES['file']['name'])) {
    $downloadFileErr = "required";
  } else {
    $file = test_input($_FILES['file']['name']);
  }

  if (empty($_FILES['image']['name'])) {
    $imageErr = "required";
  } else {
    $image = test_input($_FILES['image']['name']);
  }


  if(!empty($name) && !empty($short_desc) && !empty($long_desc) && !empty($category) && isset($name) && isset($short_desc) && isset($long_desc) && isset($category)){

    $uploadImagedir = '../upload/';
    $img = $_FILES['edit_image']['name'];
    $uploadImage = $uploadImagedir . basename($img);
    $img_extension =  pathinfo($img, PATHINFO_EXTENSION);
    if($img_extension =='mp4' || $img_extension =='mp3'){
     $imageErr ='only jpg, jpeg and png files allowed';
   }

   $uploadFiledir = '../upload/script_file/';
   $uploadfile = $uploadFiledir . basename($_FILES['file']['name']);
   $file_extension =  pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

  

   if(empty($downloadFileErr) && empty($imageErr)){
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile) && move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {


      $gamename = $_POST['gamename'];
      $short_desc =$_POST['short_desc']; 
      $long_desc =$_POST['long_desc']; 
      $category =  $_POST['category']; 
      $image = $_FILES['image']['name'];
      $file = $_FILES['file']['name'];


      
      $sql = "INSERT INTO uploaded_game (game_name, short_desc, long_desc, category, image, file) VALUES ('".$gamename."','".$short_desc."','".$long_desc."','".$category."','".$image."','".$file."')";

      if(mysqli_query($db, $sql)){
        echo "Records inserted successfully.";
        header("location:../tables/getUploadGames.php");
      } else{

        header("location:gameUpload.php");
      }

    }
 }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;


}

include("../layout/header.php");
include("../layout/sidebar.php");


$cat_sql = "SELECT * FROM category";
$cat_result = mysqli_query($db,$cat_sql);
$count = mysqli_num_rows($cat_result);


?>
<style type="text/css">
  a.btn.btn-secondary {
    float: right;
    margin-left: 10px;
  }
  th.des {
    width: 35%;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Game Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Game Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Upload New Game</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Game Name<span class="error">* <?php echo $nameErr;?></span></label>
                <input type="text" id="gamename" name="gamename" value="<?php echo $name;?>" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="inputDescription">Short Description<span class="error">* <?php echo $ShdescErr;?></span></label>
                <input type="text" id="short_desc" name="short_desc" value="<?php echo $short_desc;?>" maxlength="60" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Long Description<span class="error">* <?php echo $LgdescErr;?></span></label>
                <textarea id="long_desc" class="form-control" name="long_desc" rows="4"><?php echo $long_desc;?></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Category<span class="error">* <?php echo $categErr;?></span></label>
                <select id="category" name="category" class="form-control custom-select">
                  <option value="">Select one</option>
                  <?php  
                  
                  if(($count) > 0){
                    foreach($cat_result as $key=> $val) { ?>
                      <option <?php if($category == $val['category_name']){ echo 'selected';}?> value="<?php echo $val['category_name']; ?>"><?php echo $val['category_name']; ?></option>  
                      
                    <?php } }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Image<span class="error">* <?php echo $imageErr;?></span></label>
                  <input type="file" id="image" name="image" value="<?php echo $file;?>" class="form-control">
                  
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">File To be Download<span class="error">* <?php echo $downloadFileErr;?></span></label>
                  <input type="file" id="file" name="file"  value="<?php echo $file;?>" class="form-control">
                  
                </div>

                <div class="form-group">
                 <a href="#" onClick="window.location.reload();" class="btn btn-secondary">Cancel</a>
                 <input type="submit" name="submit" value="Create new Game" value="<?php echo $nameErr;?>" class="btn btn-success float-right">

               </div>
             </form>
           </div>



           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       
     </div>
     
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <?php  include("../layout/footer.php"); ?>
 <!-- jQuery -->
 <script src="../../plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../../dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../../dist/js/demo.js"></script>
</body>
</html>
<style type="text/css">
  .error {color: #FF0000;}
</style>
