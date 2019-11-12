<?php 
	include_once('classes/master.class.php');
	
	$user_credentials = $_SESSION['user_credentials'];
	$current_password_db = $user_credentials['password'];
	$user_id = $user_credentials['id'];


	$current_password_input = $_POST['current_pass'];
	$new_password = $_POST['new_pass'];
	$new_password_confirm = $_POST['confirm_pass'];

	if($new_password == $new_password_confirm){
		if(password_verify($current_password_input, $current_password_db)){
			$password = password_hash($new_password, PASSWORD_DEFAULT);
			
			$update_password_obj = new updateData;
			
			$update_password = $update_password_obj->updatePassword($password, $user_id);
			
			if($update_password){
				header("LOCATION: changePassword.php?status=1");
			}
			else{
				header("LOCATION: changePassword.php?status=0");
			}
		}		
	}


?>