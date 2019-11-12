<?php
	include("classes/master.class.php");

	/*
	** Create new instance of database class
	*/
	$database = new database;
	$db = $database->db;



	//setting empty variables
	$teacher_id = "";
	$subjects = "";



	// if formm submitted check if there is teacher id
	// if no teacher id, return error
	if(isset($_POST['submit']) && !empty($_POST['teacher_id'])){
		$teacher_id = trim($_POST['teacher_id']);
		//echo teachere_id."<br>";
	}
	else{
		echo "Hey! Enter Teacher Id";
		exit();
	}





	
	// if formm submitted check if there is Subject id
	// if no Subject, Name return error
	if(isset($_POST['submit']) && !empty($_POST['subjects'])){
		$subjects = $_POST['subjects'];
		//echo $subjects."<br>";
		foreach($subjects as $subject_id){
			//Check if email already exist in database
			$sql  = "SELECT * FROM assign_subjects WHERE subject_id='$subject_id'";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			
			//if exist show error
			if(!$result){
				$subject_id = $subject_id;
			}
			else{
				header("LOCATION:assignTeacherToSubject.php?status=0");
				exit();
			}
		}
	}
	else{
		echo "Hey! Enter Subjects Id";
		exit();
	}



	

	//if all data available insert into database
	if(!empty($teacher_id) 
	   && !empty($subjects)){
		
		foreach($subjects as $subject){
			$sql  = "INSERT INTO assign_subjects";
			$sql .= "(subject_id, teacher_id, added_on)";
			$sql .= "VALUES('$subject', '$teacher_id', NOW())";	
		
			$query = $db->query($sql); //run insert query
		}
			
		
			//if data inserted successfully
			//redirect to index page
			if($query == true){
				header("LOCATION:assignTeacherToSubject.php?status=1");
			}
			else{
				echo "failed to insert into database, may be some problem with database";
			}
				
	}

	else{
		echo "Please fill all the required field";
		exit();
	}
	
	
	
?>