<?php

	include_once('classes/master.class.php');

	$subject_id = $_POST['subject_id'];

	//check if posted studnet id available
	//else return error and exit
	if(isset($_POST['student_id']) && !empty($_POST['student_id'])){
		$students_id = $_POST['student_id'];
	}
	else{
		echo "No Student Id";
		exit();
	}




	//check if posted midterm result number
	//else return error and exit
	if(isset($_POST['midterm']) && !empty($_POST['midterm'])){
		$midterm = $_POST['midterm'];
	}
	else{
		echo "No Midterm Result Set";
		exit();
	}



	//check if posted final result number
	//else return error and exit
	if(isset($_POST['final']) && !empty($_POST['final'])){
		$final = $_POST['final'];
	}
	else{
		echo "No Final Result Set";
		exit();
	}
	

	if(!empty($students_id) && !empty($midterm) && !empty($final)){
		$array_index = 0;
		$result_update_obj = new updateData;
		foreach($students_id as $student_id){			
			$query = $result_update_obj->updateTeachersResult(
				$student_id,
				$subject_id,
				$midterm[$array_index], 
				$final[$array_index]
			);
			
			$array_index++;
		}
		
		if($query){
			header("LOCATION: addResultsTeacher.php?subject_id=$subject_id&status=1");
		}
	}
	else{
		echo "need every fields";
	}

?>