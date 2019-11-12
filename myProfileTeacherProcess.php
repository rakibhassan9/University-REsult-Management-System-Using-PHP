<?php
	include_once("classes/master.class.php");

	if(isset($_POST) && !empty($_POST)){
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email_address'];
	}

	if(isset($first_name) && isset($last_name) && isset($email)){
		$update_obj = new updateData;
		$update_data = $update_obj->updateMyProfileTeacher($id, $first_name, $last_name, $email);
		
		if($update_data){
			
			$_SESSION['user_credentials']['first_name'] = $first_name;
			$_SESSION['user_credentials']['last_name'] = $last_name;
			$_SESSION['user_credentials']['email'] = $email;
			header("LOCATION: myProfileTeacher.php?status=1");
		}
		else{
			header("LOCATION: myProfileTeacher.php?status=0");
		}
	}

?>