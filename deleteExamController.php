<?php
	//include master class
	include_once('classes/master.class.php');


	//check if post id is set and not empty
	//if id is set validate
	//if no id is set redirect with error code
	if(isset($_POST['id']) && !empty($_POST['id'])){
		$exam_controller_row_id = trim($_POST['id']);
		
		if(is_numeric($exam_controller_row_id)){
			$exam_controller_row_id = $exam_controller_row_id;
		}
		else{
			header("LOCATION: listExamControllers.php?wrong_id=1");
			exit();
		}
	}
	else{
		header('LOCATION: listExamControllers.php?no_id=1');
		exit();
	}

	

	//if exam controller row id is set and not empty delete row
	//if no row id set redirect to listExamControllers.php with error code
	if(isset($exam_controller_row_id) && !empty($exam_controller_row_id)){
		
		$delete_exam_controller_obj = new deleteData;
		$delete_exam_controller = $delete_exam_controller_obj->deleteById('users_credentials', $exam_controller_row_id);
		
		//if deleted succesfully redirect to listExamControllers page
		//if not deleted redirect to listExamControllers with error code
		if($delete_exam_controller==1){
			header('LOCATION: listExamControllers.php');
		}
		else{
			header('LOCATION: listExamControllers.php?not_deleted=1');
			exit();
		}
	}
	else{
		header('LOCATION: listExamControllers.php?no_id=1');
		exit();
	}

	

?>
