<?php
	//include master class
	include_once('classes/master.class.php');


	//check if get id is set and not empty
	//if id is set validate
	//if no id is set redirect with error code
	if(isset($_POST['id']) && !empty($_POST['id'])){
		$subject_row_id = trim($_POST['id']);
		
		if(is_numeric($subject_row_id)){
			$subject_row_id = $subject_row_id;
		}
		else{
			header("LOCATION: subjects.php?wrong_id=1");
			exit();
		}
	}
	else{
		header('LOCATION: subjects.php?no_id=1');
		exit();
	}

	

	//if subject row id is set and not empty delete row
	//if no row id set redirect to subjects.php with error code
	if(isset($subject_row_id) && !empty($subject_row_id)){
		
		$delete_subject_obj = new deleteData;
		$delete_subject = $delete_subject_obj->deleteById('subjects', $subject_row_id);
		
		//if deleted succesfully redirect to subjects page
		//if not deleted redirect to subjects with error code
		if($delete_subject==1){
			header('LOCATION: subjects.php');
		}
		else{
			header('LOCATION: subjects.php?not_deleted=1');
			exit();
		}
	}
	else{
		header('LOCATION: subjects.php?no_id=1');
		exit();
	}

	

?>
