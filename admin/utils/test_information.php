<?php
	class TestInformation{
		private $name, $user_created, $start_time, $end_time, $duration;

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