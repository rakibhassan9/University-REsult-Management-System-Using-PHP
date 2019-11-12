<?php
	include_once("classes/master.class.php");

	if(isset($_POST) && !empty($_POST)){
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email_address'];
		$student_roll = $_POST['student_roll'];
		$current_semester = $_POST['current_semester'];
	}

	if(isset($first_name) 
	   && isset($last_name) 
	   && isset($email) 
	   && isset($student_roll) 
	   && isset($current_semester)){
		$update_obj = new updateData;
		$update_data = $update_obj->updateMyProfileStudent(
			$id, 
			$first_name, 
			$last_name, 
			$email, 
			$student_roll, 
			$current_semester
		);
		
		if($update_data){
			
			$_SESSION['user_credentials']['first_name'] = $first_name;
			$_SESSION['user_credentials']['last_name'] = $last_name;
			$_SESSION['user_credentials']['email'] = $email;
			header("LOCATION: myProfileStudent.php?status=1");
		}
		else{
			header("LOCATION: myProfileStudent.php?status=0");
		}
	}

?>