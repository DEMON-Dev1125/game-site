<?php
include("../database.php"); 

include("../layout/header.php");
include("../layout/sidebar.php");
$sql = "SELECT * FROM register_users";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);

?>
<style type="text/css">
 .password{
  border-top-style: hidden;
  border-right-style: hidden;
  border-left-style: hidden;
  border-bottom-style: hidden;
  background: transparent;
  outline: none;

}

.password:focus, .password:active {
  background: transparent;
  outline: none;
}
.tooltip_ {
  position: relative;
  display: inline-block;
  border-bottom: none;
}

.tooltip_ .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip_ .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip_:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users Detail</li>
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
              <h3 class="card-title">Register Users</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>

                  <tr class="record">
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php  

                  if(($count) > 0){
                    foreach($result as $key=> $val) { ?>

                      <tr>
                        <td><?php echo $val['name']; ?></td>
                        <td><?php echo $val['email']; ?></td>
                        <td><div class="tooltip_"> <input type="password" name="password" class= "password" value="<?php echo $val['password']; ?>"><span class="tooltiptext"><?php echo $val['password']; ?></span>
                        </div></td>
                        <td><?php echo $val['mobile']; ?></td>


                        <td><a id="<?php echo $val['id']; ?>" class="iconbox delete"><i class="fa fa-times" aria-hidden="true"></i></a>

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
alert(deleteid);
  var confirmalert = confirm("Are you sure you want to delete it?");
  if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: '../ajax.php',
        type: 'POST',

        data: { id:deleteid, action:'delete_user' },
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
<style>
  a.iconbox {
    padding: 1px 5px;
    /* background: darkred!important; */
    border: 1px solid black;
    color: #000;
  }
</style>
</body>
</html>
