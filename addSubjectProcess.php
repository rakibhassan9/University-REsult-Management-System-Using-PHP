<?php
	include("classes/master.class.php");

	/*
	** Create new instance of database class
	*/
	$database = new database;
	$db = $database->db;



	//setting empty variables
	$subject_code = "";
	$subject_name = "";
	$semester = "";



	// if formm submitted check if there is Subject Code
	// if no Subject Code, return error
	if(isset($_POST['submit']) && !empty($_POST['subject_code'])){
		$subject_code = trim($_POST['subject_code']);
		//echo $subject_code."<br>";
	}
	else{
		echo "Hey! Enter Subject Code";
		exit();
	}





	
	// if formm submitted check if there is Subject Name
	// if no Subject, Name return error
	if(isset($_POST['submit']) && !empty($_POST['subject_name'])){
		$subject_name = trim($_POST['subject_name']);
		//echo $subject_name."<br>";
	}
	else{
		echo "Hey! Enter Subject Name";
		exit();
	}




	
	// if formm submitted check if there is semester
	// if no semester, return error
	if(isset($_POST['submit']) && !empty($_POST['semester'])){
		$semester = trim($_POST['semester']);
		//echo $semester."<br>";
	}
	else{
		echo "Hey! Enter Semester Number";
		exit();
	}


	

	//if all data available insert into database
	if(!empty($subject_code) 
	   && !empty($subject_name) 
	   && !empty($semester)){
		
			$sql  = "INSERT INTO subjects";
			$sql .= "(subject_code, subject_name, semester, added_on)";
			$sql .= "VALUES('$subject_code', '$subject_name', '$semester', NOW())";
		
		
			$query = $db->query($sql); //run insert query
		
			//if data inserted successfully
			//redirect to index page
			if($query == true){
				header("LOCATION:addSubject.php?status=1");
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