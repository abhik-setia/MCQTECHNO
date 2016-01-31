<?php
	require_once("../../includes/db_connect.php");

	class Question{
		private $question_detail, $option1, $option2, $option3, $option4;
		private $correct_ans, $marks, $negative_marks;

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
			$query_string = "CREATE TABLE IF NOT EXISTS "+ $name + "_questions" + "(
							  `question` text NOT NULL,
							  `option1` text NOT NULL,
							  `option2` text NOT NULL,
							  `option3` text NOT NULL,
							  `option4` text NOT NULL,
							  `correct_ans` text NOT NULL,
							  `marks` int(11) NOT NULL,
							  `negative_marks` int(11) NOT NULL
							)";
			$db = new DB_CONNECT();	
			$result = $db->query_database($query_string); 
			return $result;
		}
	}
?>