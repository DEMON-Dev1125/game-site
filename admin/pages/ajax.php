<?php 
include "database.php";

$id = 0;

if((isset($_POST["id"])) && ($_REQUEST['action'] == 'delete_game')){

	$game_id = $_POST['id'];


	$query = "DELETE FROM uploaded_game WHERE id='".$game_id."'";

	$result= mysqli_query($db,$query);

	$row = mysqli_affected_rows($db);
	if($row){
		$resArr['output'] = "Record Deleted successfully";
		$resArr['msg'] = "success";
	}else{
		$resArr['output'] = "Something Wrong";
		$resArr['msg'] = "error";
	}
	echo json_encode($resArr);	
	exit;
}

if((isset($_POST["id"])) && ($_REQUEST['action'] == 'delete_user')){

	$user_id = $_POST['id'];

	$query = "DELETE FROM register_users WHERE id='".$user_id."'";

	$result= mysqli_query($db,$query);

	$row = mysqli_affected_rows($db);
	if($row){
		$resArr['output'] = "User Deleted successfully";
		$resArr['msg'] = "success";
	}else{
		$resArr['output'] = "Something Wrong";
		$resArr['msg'] = "error";
	}
	echo json_encode($resArr);	
	exit;
}

if((isset($_POST["id"])) && ($_REQUEST['action'] == 'delete_cat')){

	$cat_id = $_POST['id'];

	$query = "DELETE FROM category WHERE id='".$cat_id."'";

	$result= mysqli_query($db,$query);

	$row = mysqli_affected_rows($db);
	if($row){
		$resArr['output'] = "category Deleted successfully";
		$resArr['msg'] = "success";
	}else{
		$resArr['output'] = "Something Wrong";
		$resArr['msg'] = "error";
	}
	echo json_encode($resArr);	
	exit;
}
