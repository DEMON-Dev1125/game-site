<?php 
include('header.php');
include("admin/pages/database.php");
$product_id  = base64_decode($_GET['product']);
if($product_id ==''){
	header("location: index.php");
}
 $sql = "SELECT * FROM uploaded_game where id='".$product_id."'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
  ?>
<div class="container shoppage" >
 <div class="row product_detail">

 	<div class="prod_left">
 		<img class="download_game" src="admin/pages/upload/<?php echo $row['image']; ?>">
 	</div>
 	<div class="prod_right">
 		 <h3 class="prod_title"><?php echo $row['game_name']; ?></h3>
  
          <h5 class="short_desc"><?php echo $row['short_desc']; ?></h5>
          <p class="long_desc"><?php echo $row['long_desc']; ?></p>
          <div class="prod_rating"> Avg. Rating: 
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            <i class='far fa-star'></i>
            
          </div>

          
          <button class="btn btn-info checkoutbtn">  <a href="admin/pages/upload/script_file/downloadFile.php?file=<?php echo $row['file']; ?>" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Download </a></button> 
 	</div>

  </div>
  </div>

<?php include('footer.php');?>

<style type="text/css">
 <?php include('style.css');?> 

</style>
