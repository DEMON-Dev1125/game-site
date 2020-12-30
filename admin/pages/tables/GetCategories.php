<?php 
include("../database.php");

include("../layout/header.php");
include("../layout/sidebar.php"); 
$sql = "SELECT * FROM category";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);

?>

<style>
  a.iconbox {
    padding: 1px 2px;
    border: 1px solid black;
    color: #000;
  }
  .content-wrapper {
    width: unset;
  }

</style>    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Categories Detail</h3>
              <a class="btn btn-info" href="../forms/add_category.php" style="float:right;">Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                 
                  <tr class="record">
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php  
                  
                  if(($count) > 0){
                    foreach($result as $key=> $val) { ?>

                      <tr>
                       
                       <td><?php echo $val['id']; ?></td>
                       <td><?php echo $val['category_name']; ?></td>
                       <td style="width: 20px;"><a id="<?php echo $val['id']; ?>" class="iconbox delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <a href="../forms/edit_category.php?catid=<?php echo $val['id']; ?>" class="iconbox"><i class="fa fa-pen" aria-hidden="true"></i></a>
                      </td>
                    </tr>

                  <?php } }?>
                  
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php  include("../layout/footer.php"); ?>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->

<script type="text/javascript">
  $(document).ready(function(){
    $( "tr" ).addClass( "record" );
 // Delete 
 $('.delete').click(function(){
  
  var deleteid = $(this).attr('id');

  var confirmalert = confirm("Are you sure you want to delete it?");
  if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: '../ajax.php',
        type: 'POST',

        data: { id:deleteid, action:'delete_cat' },
        success: function(response){
          var resp = $.parseJSON(response);
          if(resp.msg=='success'){
            
            $("#" + deleteid).parents(".record").animate({ backgroundColor: "#ce8f8f" }, "fast")
            .animate({ opacity: "hide" }, "slow");

          }
          
          
        }
      });



    }

  });

});
</script>

</body>
</html>
