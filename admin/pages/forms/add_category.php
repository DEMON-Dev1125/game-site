<?php 
include("../database.php");
$catErr  = "";
$catgory = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["catgory"])) {
		$catErr = "required";
	} else {
		$catgory = test_input($_POST["catgory"]);
	}
	
	if(!empty($catgory) && isset($catgory)){

		$catgory = $_POST['catgory'];
		
		echo $sql = "INSERT INTO category (category_name) VALUES ('".$catgory."')";

		if(mysqli_query($db, $sql)){
			echo "Catgory inserted successfully.";
			header("location:../tables/GetCategories.php");
		} else{
			
			header("location:add_category.php");
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
					<h1> Add Category</h1>
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
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Add New Category</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">

						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
							<div class="form-group">
								<label for="inputName">Category Name<span class="error">* <?php echo $catErr;?></span></label>
								<input type="text" id="catgory" name="catgory" value="<?php echo $catgory;?>" class="form-control">
								
							</div>
							
							<div class="form-group">
								<a href="#" onClick="window.location.reload();" class="btn btn-secondary">Cancel</a>
								<input type="submit" name="submit" value="Create New Category" class="btn btn-success float-right">

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
