<?php
	if(isset($_SESSION['user_credentials'])){
		$user_credentials = $_SESSION['user_credentials'];
		$user_type = $user_credentials['user_type'];
		
		if($user_type==1){
			include_once("rightPanelSuperAdmin.php");
		}
		elseif($user_type==2){
			include_once("rightPanelExamController.php");
		}
		elseif($user_type==3){
			include_once("rightPanelTeacher.php");
		}
		elseif($user_type==4){
			include_once("rightPanelStudent.php");
		}
	}
	

?>