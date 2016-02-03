<?php
	require_once("../includes/db_connect.php");

	class User{
		private $first_name, $last_name, $email, $phone_number, $marks_scored;
		private $questions_attempted, $correct_ans, $wrong_ans;

		public function __get($property) {
		    if (property_exists($this, $property)) {
		      return $this->$property;
		    }
		}

		public function __set($property, $value) {
		    if (property_exists($this, $property)) {
		      $this->$property = $value;
		    }

		    return $this;
		} 

		public static function create_table($name){
			$query_string = "CREATE TABLE IF NOT EXISTS " . $name . "_users " . "(
							  `first_name` varchar(30) NOT NULL,
							  `last_name` varchar(30) NOT NULL,
							  `email` varchar(30) NOT NULL,
							  `phone_number` varchar(13) NOT NULL,
							  `score` int(11) NOT NULL DEFAULT '0',
							  `questions_attempted` int(11) NOT NULL DEFAULT '0',
							  `correct_ans` int(11) NOT NULL DEFAULT '0',
							  `wrong_ans` int(11) NOT NULL DEFAULT '0',
							  PRIMARY KEY (`email`),
							  UNIQUE KEY `phone_number` (`phone_number`)
							)";
			$db = new DB_CONNECT();	
			$result = $db->query_database($query_string); 
			return $result;
		}
	}
?>