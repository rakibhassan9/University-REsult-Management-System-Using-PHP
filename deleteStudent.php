<?php
	//include master class
	include_once('classes/master.class.php');


	//check if post id is set and not empty
	//if id is set validate
	//if no id is set redirect with error code
	if(isset($_POST['id']) && !empty($_POST['id'])){
		$student_row_id = trim($_POST['id']);
		
		if(is_numeric($student_row_id)){
			$student_row_id = $student_row_id;
		}
		else{
			header("LOCATION: listStudents.php?wrong_id=1");
			exit();
		}
	}
	else{
		header('LOCATION: listStudents.php?no_id=1');
		exit();
	}

	

	//if student row id is set and not empty delete row
	//if no row id set redirect to listStudents.php with error code
	if(isset($student_row_id) && !empty($student_row_id)){
		
		$delete_student_obj = new deleteData;
		$delete_student = $delete_student_obj->deleteById('users_credentials', $student_row_id);
		$delete_result_teacher = $delete_student_obj->deleteById('results_teacher', $student_row_id, 'student_id');
		$delete_result_exam_controller = $delete_student_obj->deleteById('results_exam_controller', $student_row_id, 'student_id');
		
		//if deleted succesfully redirect to listStudents page
		//if not deleted redirect to listStudents with error code
		if($delete_student==1){
			if(isset($_POST['redirectPage']) && $_POST['redirectPage']=='pendingStudentsRegistraion'){
				header('LOCATION: pendingStudentsRegistration.php');
			}
			else{
				header('LOCATION: listStudents.php');
			}
		}
		else{
			if(isset($_POST['redirectPage']) && $_POST['redirectPage']=='pendingStudentsRegistraion'){
				header('LOCATION: pendingStudentsRegistration.php?not_deleted=1');
			}
			else{
				header('LOCATION: listStudents.php?not_deleted=1');
				exit();
			}
		}
	}
	else{
		header('LOCATION: listStudents.php?no_id=1');
		exit();
	}

	

?>
