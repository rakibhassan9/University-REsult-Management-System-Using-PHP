<?php
	//include master class
	include_once('classes/master.class.php');


	//check if post id is set and not empty
	//if id is set validate
	//if no id is set redirect with error code
	if(isset($_POST['id']) && !empty($_POST['id'])){
		$teacher_row_id = trim($_POST['id']);
		
		if(is_numeric($teacher_row_id)){
			$teacher_row_id = $teacher_row_id;
		}
		else{
			header("LOCATION: listTeachers.php?wrong_id=1");
			exit();
		}
	}
	else{
		header('LOCATION: listTeachers.php?no_id=1');
		exit();
	}




	//if teacher row id is set and not empty delete row
	//if no row id set redirect to listTeachers.php with error code
	if(isset($teacher_row_id) && !empty($teacher_row_id)){
		
		$database = new database;
		$db = $database->db;
		
		$sql  = "UPDATE users_credentials SET verification_status=1 WHERE id=$teacher_row_id";
		$query = $db->query($sql);
		
		//if deleted succesfully redirect to listTeachers page
		//if not deleted redirect to listTeachers with error code
		if($query==1){
			if(isset($_POST['redirectPage']) && $_POST['redirectPage']=='pendingTeachersRegistraion'){
				header('LOCATION: pendingStudentsRegistration.php');
			}
			else{
				header('LOCATION: listStudents.php');
			}
			
		}
		else{
			if(isset($_POST['redirectPage']) && $_POST['redirectPage']=='pendingTeachersRegistraion'){
				header('LOCATION: pendingTeachersRegistration.php?not_deleted=1');
			}
			else{
				header('LOCATION: listTeachers.php?not_deleted=1');
				exit();
			}			
		}
	}
	else{
		header('LOCATION: listTeachers.php?no_id=1');
		exit();
	}

	

?>
