<?php 
include("../database.php");
$catErr  = "";
$catgory = "";
$edit_id = $_GET['catid'];

$sql = "SELECT * FROM category WHERE id = $edit_id";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["edit_catgory"])) {
    $catErr = "required";
  } else {
    $edit_catgory = test_input($_POST["edit_catgory"]);
  }
  
  if(!empty($edit_catgory) && isset($edit_catgory)){

    $edit_catgory = $_POST['edit_catgory'];
    
    
    $sql = "UPDATE category SET category_name='".$edit_catgory."' WHERE id= '".$edit_id."'";
    
    if(mysqli_query($db, $sql)){
     echo "Records inserted successfully.";
     header("location:../tables/GetCategories.php");
   } else{
    
     header("location:edit_catgory.php");
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
          <h1> Edit Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
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
            <h3 class="card-title">Edit Category</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <form method="post">
              <div class="form-group">
                <label for="inputName">Category Name<span class="error">* <?php echo $catErr;?></span></label>
                <input type="text" id="edit_catgory" name="edit_catgory" value="<?php echo $row['category_name']; ?>" class="form-control">
                
              </div>
              
              <div class="form-group">
               <a href="#" onClick="window.location.reload();" class="btn btn-secondary">Cancel</a>
               <input type="submit" name="submit" value="Update Category"  class="btn btn-success float-right">

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
