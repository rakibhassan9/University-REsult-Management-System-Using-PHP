<?php 
	include_once("classes/master.class.php");

	// create new instance of database class
	$database = new database;
	$db = $database->db;

	if(isset($_POST) && !empty($_POST)){
		$subject_id = $_POST['subject_id'];
		$students_id = $_POST['student_id'];
		$status = $_POST['status'];
	}


	if(isset($students_id) && isset($subject_id) && isset($status)){
		if(!empty($students_id) && !empty($subject_id) && !empty($status)){
			$array_index = 0;
			foreach($students_id as $student_id){				
				$sql = "UPDATE results_teacher SET status=$status[$array_index] WHERE subject_id=$subject_id AND student_id=$student_id";
				
				$query = $db->query($sql);
				
				$array_index++;
			}
			
			if($query){
				header("LOCATION: resultsBySubject.php?subject_id=$subject_id&st=1");
			}
			
		}
	}
?>