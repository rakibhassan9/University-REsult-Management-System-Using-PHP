<?php 
	include('classes/master.class.php');
	
	if(isset($_SESSION['user_credentials']) && !empty($_SESSION['user_credentials'])){
		$user_credentials = $_SESSION['user_credentials'];
		
		$user_type = $user_credentials['user_type'];
		
		if($user_type == 1){
			include('myProfileSuperAdmin.php');
		}
		elseif($user_type == 2){
			include('myProfileExamController.php');
		}
		elseif($user_type == 3){
			include('myProfileTeacher.php');
		}
		elseif($user_type == 4){
			include('myProfileStudent.php');
		}
		else{
			header("LOCATION: login.php");
		}
	}

?>