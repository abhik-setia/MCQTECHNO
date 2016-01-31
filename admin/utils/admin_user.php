<?php
	
	class AdminUser{
		private $username, $password, $phone_number, $email ;
		private $first_name, $last_name;
		
		function __construct() {
			$this->id = 0;
			$this->username = "";
			$this->password = "";
			$this->phone_number = "";
			$this->email = "";
			$this->first_name = "";
			$this->last_name = "";
		}

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

	}
?>