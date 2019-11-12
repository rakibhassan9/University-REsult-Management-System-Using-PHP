<?php
	
	class updateData{
		
		
		
		/*
		** This function will get all rows of data from table
		** argument 1 = table name
		** argument 2 = sort by column name
		** argument 3 = sorting order
		*/
		public function updateTeachersResult($student_id, $subject_id, $midterm, $final){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE results_teacher SET midterm=$midterm, final=$final ";
			$sql .=	"WHERE student_id=$student_id AND subject_id=$subject_id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		
		/*
		** This function will get all rows of data from table
		** argument 1 = table name
		** argument 2 = sort by column name
		** argument 3 = sorting order
		*/
		public function updateExamControllersResult(
			$student_id, 
			$subject_id, 
			$attendance, 
			$assignment, 
			$tutorial, 
			$viva, 
			$presentation, 
			$status)
		{
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE results_exam_controller SET attendance=$attendance, assignment=$assignment, ";
			$sql .=	"tutorial=$tutorial, viva=$viva, presentation=$presentation, status=$status ";
			$sql .=	"WHERE student_id=$student_id AND subject_id=$subject_id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		
		
		
				
		
		/*
		** This function will get all rows of data from table
		** argument 1 = table name
		** argument 2 = sort by column name
		** argument 3 = sorting order
		*/
		public function updateStatus($table, $column, $status, $where_column, $where_data){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE $table SET $column=$status ";
			$sql .=	"WHERE $where_column=$where_data";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		
		public function updatePassword($password, $user_id){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE users_credentials SET password='$password' ";
			$sql .=	"WHERE id=$user_id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		public function updateMyProfileSuperAdmin($id, $first_name, $last_name, $email){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE users_credentials SET first_name='$first_name', last_name='$last_name', ";
			$sql .=	"email='$email' ";
			$sql .=	"WHERE id=$id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		
		public function updateMyProfileTeacher($id, $first_name, $last_name, $email){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE users_credentials SET first_name='$first_name', last_name='$last_name', ";
			$sql .=	"email='$email' ";
			$sql .=	"WHERE id=$id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		
		public function updateMyProfileStudent($id, $first_name, $last_name, $email, $student_roll, $current_semester){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE users_credentials SET first_name='$first_name', last_name='$last_name', ";
			$sql .=	"email='$email' ";
			$sql .=	"WHERE id=$id";
			$query = $db->query($sql);
			
			
			$sql  = "UPDATE students_profile SET roll='$student_roll', ";
			$sql .=	"current_semester='$current_semester'";
			$sql .=	"WHERE user_id=$id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		public function updateMyProfileExamController($id, $first_name, $last_name, $email){
						
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			 
			$sql  = "UPDATE users_credentials SET first_name='$first_name', last_name='$last_name', ";
			$sql .=	"email='$email' ";
			$sql .=	"WHERE id=$id";
			$query = $db->query($sql);
			
			return $query;
		}
		
		
		
		
	
	}// end class