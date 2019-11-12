<?php
	
	class deleteData{
		
		
		
		/*
		** This function will delete rows by id
		** argument 1 = table name
		** argument 2 = row id
		*/
		public function deleteById($table, $row_id, $column='id'){
			
			// create new instance of database class
			$database = new database;
			$db = $database->db;
			
			$sql = "DELETE FROM $table WHERE $column='$row_id'";
			$query = $db->query($sql);
			
			if($query==1){
				return true;
			}
		}
		
		
		
		
		
		
		
		
				
		
		
		
		
		
		
	
	}// end class