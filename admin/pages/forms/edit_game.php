<?php 
include("../database.php");

$record_id = $_GET['id'];

$sql = "SELECT * FROM uploaded_game WHERE id = $record_id";
$result = mysqli_query($db,$sql);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$nameErr = $ShdescErr = $LgdescErr = $categErr = $downloadFileErr = $imageErr = "";
$name = $short_desc = $long_desc = $category = $edit_file = $image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["edit_gamename"])) {
    $nameErr = "required";
  } else {
    $name = test_input($_POST["edit_gamename"]);
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

  if (empty($_POST["edit_category"])) {
    $categErr =  "required";
  } else {
    $category = test_input($_POST["edit_category"]);
  }
  if (empty($row["file"])) {
    if (empty($_POST["edit_file"])) {
      $downloadFileErr = "required";
    } else {
     echo $edit_file = test_input($_POST["edit_file"]);
    }

  }
  if (empty($row["image"])) {
    if (empty($_POST["edit_image"])) {
      $imageErr = "required";
    } else {
      echo $image = test_input($_POST["edit_image"]);
    }

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
   $file = $_FILES['edit_file']['name'];
   $uploadfile = $uploadFiledir . basename($file);
   $file_extension =  pathinfo($file, PATHINFO_EXTENSION);

   

    
     if (move_uploaded_file($_FILES['edit_image']['tmp_name'], $uploadImage) || move_uploaded_file($_FILES['edit_file']['tmp_name'], $uploadfile)) {
       $edit_gamename = $_POST['edit_gamename'];
       $short_desc =$_POST['short_desc']; 
       $long_desc =$_POST['long_desc']; 
       $edit_category =  $_POST['edit_category']; 
       if(empty($file)){
         $edit_file = $row['file'];
       }else{
        $edit_file = $file;
       }
      if(empty($img)){
         $edit_image = $row['image'];
       }else{
         $edit_image = $img;
       }
      
      


       $update = "UPDATE uploaded_game SET game_name='".$edit_gamename."',short_desc='".$short_desc."',long_desc='".$long_desc."',category='".$edit_category."',image='".$edit_image."',file='".$edit_file."' WHERE id= '".$record_id."'";

       if(mysqli_query($db, $update)){
        echo "Records inserted successfully.";
       header("location:../tables/getUploadGames.php");
      } else{
       header("location:edit_game.php");
      }

    }

    else if(!empty($row["image"]) && !empty($row["file"])){
     $edit_gamename = $_POST['edit_gamename'];
     $short_desc =$_POST['short_desc']; 
     $long_desc =$_POST['long_desc']; 
     $edit_category =  $_POST['edit_category']; 
     $edit_image = $row["image"];
     $edit_file = $row["file"];

     $update = "UPDATE uploaded_game SET game_name='".$edit_gamename."',short_desc='".$short_desc."',long_desc='".$long_desc."',category='".$edit_category."',image='".$edit_image."',file='".$edit_file."' WHERE id= '".$record_id."'";

     if(mysqli_query($db, $update)){
      echo "Records inserted successfully.";
      header("location:../tables/getUploadGames.php");
    } else{
     header("location:edit_game.php");
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
  .error {color: #FF0000;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Game Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Game Edit</li>
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
            <h3 class="card-title">Edit Game Here</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="Name">Edit Game Name<span class="error">* <?php echo $nameErr;?></label>
                  <input type="text" name="edit_gamename" class="form-control" id="edit_gamename" value="<?php echo $row['game_name']; ?>" placeholder="Enter Game Name">
                </div>

                <div class="form-group">
                  <label for="Description">Short Description<span class="error">* <?php echo $ShdescErr;?></span></label>
                  <input type="text" id="short_desc" name="short_desc" value="<?php echo $row['short_desc']; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Description">Long Description<span class="error">* <?php echo $LgdescErr;?></span></label>
                  <textarea name="long_desc" class="form-control" id="exampleInputPassword1" placeholder="Enter Description"><?php echo $row['long_desc']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Edit Category <span class="error">* <?php echo $categErr;?></span></label>

                  <select id="category" name="edit_category" class="form-control custom-select">
                    <option value="">Select one</option>

                    <?php  

                    if(($count) > 0){
                      foreach($cat_result as $key=> $val) { ?>
                        <option <?php if($row['category'] == $val['category_name']){ echo 'selected';}?> value="<?php echo $val['category_name']; ?>"><?php echo $val['category_name']; ?></option>  
                      <?php } }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Edit Iamge<span class="error">* <?php echo $imageErr;?></span></label>
                    <input type="file" name="edit_image" class="form-control" id="edit_image" value="<?php echo $row['image']; ?>">

                  </div> 
                  <?php if(!empty($row['image'])) { ?>
                  <img  width="100" class="download_game" src="../upload/<?php echo $row['image']; ?>">
                   <?php } ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Edit File To be Download<span class="error">* <?php echo $downloadFileErr;?></span></label>
                    <input type="file" name="edit_file" class="form-control" id="edit_file" value="<?php echo $row['file']; ?>">

                  </div>
                  <?php if(!empty($row['file'])) { ?>
                    <p><b>Uploaded File: </b> <?php echo $row['file']; ?></p>
                  <?php } ?>
                  
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button style="float: right;" type="submit" name="submit" class="btn btn-primary">Update Game</button>
                  </div>
                </form>
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
