<?php
	
	class retrieveData{
		
		
		
		/*
		** This function will get all rows of data from table
		** argument 1 = table name
		** argument 2 = sort by column name
		** argument 3 = sorting order
		*/
		public function retrieveAll($table, $sort_by_column, $sort_order="DESC"){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql = "SELECT * FROM $table ORDER BY $sort_by_column $sort_order";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		
		/*
		** This function will get users by type
		** argument 1 = table name
		** argument 2 = user type
		** argument 3 = sort by column
		** argument 4 = sorting order
		*/
		public function retrieveByUserType($table, $user_type, $sort_by_column, $sort_order="DESC"){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM $table WHERE user_type=$user_type ";
			$sql .= "ORDER BY $sort_by_column $sort_order";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		
		
		
		/*
		** This function will get users by type
		** argument 1 = table name
		** argument 2 = teacher_id
		*/
		public function retrieveByTeacherId($table, $teacher_id){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM $table WHERE teacher_id=$teacher_id";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		
		
		
		/*
		** This function will get data by id
		** argument 1 = table name
		** argument 2 = id
		*/
		public function retrieveById($table, $id, $column_name='id'){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM $table WHERE $column_name=$id";
			$query = $db->query($sql);
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		public function studentsBySemester($semester){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT user_id FROM students_profile WHERE current_semester=$semester";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		/*
		** This function will get data by id
		** argument 1 = table name
		** argument 2 = id
		*/
		public function retrieveBySemester($semester){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM subjects WHERE semester=$semester";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		/*
		** This function will get data by id
		** argument 1 = table name
		** argument 2 = id
		*/
		public function studentMidResults($subject_id, $student_id){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT midterm FROM results_teacher WHERE ";
			$sql .=	"subject_id=$subject_id AND student_id=$student_id";
			$query = $db->query($sql);
			$result = $query->fetchColumn();
			return $result;
		}
		
		
		
		
		/*
		** This function will get data by id
		** argument 1 = table name
		** argument 2 = id
		*/
		public function studentFinalResults($subject_id, $student_id){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT final FROM results_teacher WHERE ";
			$sql .=	"subject_id=$subject_id AND student_id=$student_id";
			$query = $db->query($sql);
			$result = $query->fetchColumn();
			return $result;
		}
		
		
		
		
		
		
		
		/*
		** This function will get data by id
		** argument 1 = table name
		** argument 2 = id
		*/
		public function retrieveResultTeacher($subject_id, $student_id){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM results_teacher WHERE subject_id=$subject_id ";
			$sql .=	"AND student_id=$student_id";
			$query = $db->query($sql);
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		
		
		/*
		** This function will get data by id
		** argument 1 = table name
		** argument 2 = id
		*/
		public function retrieveResultExamController($subject_id, $student_id){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM results_exam_controller WHERE subject_id=$subject_id ";
			$sql .=	"AND student_id=$student_id";
			$query = $db->query($sql);
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
		
		
		
		
		/*
		** This function will get users by verification status
		** argument 1 = table name
		** argument 2 = user type
		** argument 3 = verification status
		** argument 3 = sort by column
		** argument 4 = sorting order
		*/
		public function retrieveByUserVerification(
			$table, 
			$user_type, 
			$verification_status=0, 
			$sort_by_column='id', 
			$sort_order='DESC'
		){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql  = "SELECT * FROM $table WHERE user_type=$user_type ";
			$sql .= "AND verification_status=$verification_status ";
			$sql .= "ORDER BY $sort_by_column $sort_order";
			$query = $db->query($sql);
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		
		
		
				
		
		
		
		
		
		
	
	}// end class