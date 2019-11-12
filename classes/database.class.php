<?php 
	class database{
		public $db;
		private $_database_user_name = 'ucrms_usr';
		private $_password = 'UTWEQbjBnq90sRik';
		private $_dsn = 'mysql:host=localhost;dbname=ucrms';
		
		public function __construct(){
			
			$dsn = $this->_dsn;
			$userName = $this->_database_user_name;
			$password = $this->_password;
			
			try{
				$this->db = new PDO($dsn,$userName,$password,array(PDO::ATTR_PERSISTENT => true));
				$db = $this->db;
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE); //set PDO emulator for prepared statement
				$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //SET PDO error mode to exeption
				return $db;
			}
			catch(Exception $e){
				$erroMessage = "There is a problem with database connection  <br/>";
				$erroMessage .= "Call: +8801723527367  <br/>";
				$erroMessage .= "To let know the administrator  <br/>";
				echo $erroMessage . $e->getMessage();
			}
				
		}//end of function __construct		
	}//end of the class
