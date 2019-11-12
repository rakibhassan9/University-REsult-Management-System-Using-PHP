<?php
	include("classes/master.class.php");

	/*
	** Create new instance of database class
	*/
	$database = new database;
	$db = $database->db;



	//setting empty variables
	$email = "";
	$password = "";



	// if formm submitted check if there is email address
	// if no email address return error
	if(isset($_POST['submit']) && !empty($_POST['email_address'])){
		$email = trim($_POST['email_address']);		
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
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
			$password = $password;
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






	//if all data available insert into database
	if(!empty($email) && !empty($password)){
		
		$sql = "SELECT password FROM users_credentials WHERE email='$email' AND verification_status=1";
		$query = $db->query($sql);
		$password_from_db = $query->fetch(PDO::FETCH_ASSOC);
		
		if(password_verify($password, $password_from_db['password'])){
			$sql = "SELECT * FROM users_credentials WHERE email='$email'";
			$query = $db->query($sql);
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			
			if($results){
				foreach ($results as $result){					
					$_SESSION['user_credentials'] = $result;
				}
								
				if(!empty($_SESSION['user_credentials'])){
					if($_SESSION['user_credentials']['user_type'] == 4){
						header("LOCATION: myProfile.php");
					}
					else{
						header("LOCATION: index.php");
					}					
				}
			}
		}
		else{
			header("LOCATION: login.php?error=pass");
		}
		
	 
	}

	else{
		echo "Please fill all the required field";
		exit();
	}
	
	
	
?>