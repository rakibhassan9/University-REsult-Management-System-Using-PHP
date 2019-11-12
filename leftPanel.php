<?php 
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
?>



<?php 

	if(isset($_SESSION['user_credentials'])){
		$user_credentials = $_SESSION['user_credentials'];
	}

	if(isset($user_credentials) && $user_credentials['user_type'] == 1){
		include_once("leftPanelSuperAdmin.php"); 
	}
	elseif(isset($user_credentials) && $user_credentials['user_type'] == 2){
		include_once("leftPanelExamController.php"); 
	}
	elseif(isset($user_credentials) && $user_credentials['user_type'] == 3){
		include_once("leftPanelTeacher.php"); 
	}
	elseif(isset($user_credentials) && $user_credentials['user_type'] == 4){
		include_once("leftPanelStudent.php");
	}
	else{
		header("LOCATION: login.php");
	}

?>