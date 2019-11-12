<?php
	include("classes/master.class.php");

	/*
	** Create new instance of database class
	*/
	$database = new database;
	$db = $database->db;



	//setting empty variables
	$first_name = "";
	$last_name = "";
	$email = "";
	$password = "";
	$signup_as = "";



	// if formm submitted check if there is first name
	// if no first name return error
	if(isset($_POST['submit']) && !empty($_POST['first_name'])){
		$first_name = trim($_POST['first_name']);
		//echo $first_name."<br>";
	}
	else{
		echo "Don't you know your first name?";
	}





	
	// if formm submitted check if there is last name
	// if no last name return error
	if(isset($_POST['submit']) && !empty($_POST['last_name'])){
		$last_name = trim($_POST['last_name']);
		//echo $last_name."<br>";
	}
	else{
		echo "Did you forgot your last name?";
	}






	// if formm submitted check if there is email address
	// if no email address return error
	if(isset($_POST['submit']) && !empty($_POST['email_address'])){
		$email = trim($_POST['email_address']);
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			//Check if email already exist in database
			$sql  = "SELECT * FROM users_credentials WHERE email='$email'";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			
			//if exist show error
			if(!$result){
				$email = $email;
			}
			else{
				echo "Email already in use";
				exit();
			}
		}
		else{
			echo "Invalid Email Address";
			exit();
		}
		//echo $email."<br>";
	}
	else{
		echo "Really? Who is going to fill email adress?";
		exit();
	}






	// if formm submitted check if there is password
	// if no password return error
	if(isset($_POST['submit']) && !empty($_POST['password'])){
		$password = trim($_POST['password']);
		
		if(strlen($password)>=6){
			$password = password_hash($password, PASSWORD_DEFAULT);
		}
		else{
			echo "Password must be 6 or more characters long";
			exit();
		}		
		
		//echo $password."<br>";
	}
	else{
		echo "Who is going to type password?";
	}






	// if formm submitted check if there is user type selected
	// if no user type selected return error
	if(isset($_POST['submit']) && !empty($_POST['registerAs'])){
		$signup_as = trim($_POST['registerAs']);
		
		if($signup_as == 1 || $signup_as == 2){
			$verification_status = 1;
		}
		else{
			$verification_status = 0;
		}
		//echo $signup_as."<br>";
	}
	else{
		echo "Please Fill Account Type Either Student or Teacher";
	}




	//if all data available insert into database
	if(!empty($first_name) 
	   && !empty($last_name) 
	   && !empty($email) 
	   && !empty($password) 
	   && !empty($signup_as)){
		
			$sql  = "INSERT INTO users_credentials";
			$sql .= "(first_name, last_name, email, ";
			$sql .= "password, user_type, verification_status, registered_on)";
			$sql .= "VALUES('$first_name', '$last_name', '$email', ";
			$sql .= "'$password', '$signup_as', '$verification_status', NOW())";
		
		
			$query = $db->query($sql); //run insert query
		
			//if data inserted successfully and is student
			//create also insert student id in result table
			if($query==true && $signup_as==4){
				$student_id = $db->lastInsertId();
				
				//insert data to student profile table
				$sql  = "INSERT INTO students_profile (user_id, created_on) ";
				$sql .= "VALUES('$student_id', NOW())";				
				$query = $db->query($sql);
				
				
				//insert data to results table
				$retrieve_subjects_obj = new retrieveData;
				$retrieve_subjects = $retrieve_subjects_obj->retrieveAll('subjects', 'id', 'ASC');
				
				foreach($retrieve_subjects as $retrieve_subject){
					$subject_id = $retrieve_subject['id'];					
					$sql  = "INSERT INTO results_teacher";
					$sql .= "(student_id, subject_id, added_on)";
					$sql .= "VALUES('$student_id', '$subject_id', NOW())";

					$query = $db->query($sql); //run insert query		
					
					
					$sql  = "INSERT INTO results_exam_controller";
					$sql .= "(student_id, subject_id, added_on)";
					$sql .= "VALUES('$student_id', '$subject_id', NOW())";

					$query = $db->query($sql); //run insert query		
				}			
				
			}
		
			//if data inserted successfully
			//redirect to index page
			if($query == true){
				if($signup_as == 3 || $signup_as == 4){
					header("LOCATION:index.php");
				}
				elseif($signup_as == 2){
					header("LOCATION:addExamController.php?status=1");
				}
				else{
					header("LOCATION:addSuperAdmin.php?status=1");
				}
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