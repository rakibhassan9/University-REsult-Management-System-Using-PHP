<?php
	
	include_once('classes/master.class.php');



	//check if posted studnet id available
	//else return error and exit
	if(isset($_POST['student_id']) && !empty($_POST['student_id'])){
		$subject_id = $_POST['subject_id'];
		$students_id = $_POST['student_id'];
	}
	else{
		echo "No Student Id";
		exit();
	}





	//check if posted midterm result number
	//else return error and exit
	if(isset($_POST['attendance']) && !empty($_POST['attendance'])){
		$attendance = $_POST['attendance'];
	}
	else{
		echo "No Attendance Result Set";
		exit();
	}




	//check if posted final result number
	//else return error and exit
	if(isset($_POST['assignment']) && !empty($_POST['assignment'])){
		$assignment = $_POST['assignment'];
	}
	else{
		echo "No Assignment Result Set";
		exit();
	}





	//check if posted final result number
	//else return error and exit
	if(isset($_POST['tutorial']) && !empty($_POST['tutorial'])){
		$tutorial = $_POST['tutorial'];
	}
	else{
		echo "No Tutorial Result Set";
		exit();
	}




	//check if posted final result number
	//else return error and exit
	if(isset($_POST['viva']) && !empty($_POST['viva'])){
		$viva = $_POST['viva'];
	}
	else{
		echo "No Viva Result Set";
		exit();
	}





	//check if posted final result number
	//else return error and exit
	if(isset($_POST['presentation']) && !empty($_POST['presentation'])){
		$presentation = $_POST['presentation'];
	}
	else{
		echo "No Presentation Result Set";
		exit();
	}





	//check if posted final result number
	//else return error and exit
	if(isset($_POST['status']) && !empty($_POST['status'])){
		$status = $_POST['status'];
	}
	else{
		echo "No Status Set";
		exit();
	}


	if(!empty($students_id) && !empty($attendance) && !empty($assignment)
	  && !empty($tutorial) && !empty($viva) && !empty($presentation) 
	  && !empty($status)){
		$array_index = 0;
		$result_update_obj = new updateData;
		foreach($students_id as $student_id){			
			$query = $result_update_obj->updateExamControllersResult(
				$student_id,
				$subject_id,
				$attendance[$array_index], 
				$assignment[$array_index],
				$tutorial[$array_index],
				$viva[$array_index],
				$presentation[$array_index],
				$status[$array_index]
			);
					
			
			if($query){
				$query = $result_update_obj->updateStatus(
					'results_teacher',
					'status',
					$status[$array_index],
					'student_id',
					$student_id
				);
			}
			
			$array_index++;
		}
		
		if($query){
			header("LOCATION: addResultsExamController.php?subject_id=$subject_id&status=1");
		}
	}
	else{
		echo "need every fields";
	}

?>