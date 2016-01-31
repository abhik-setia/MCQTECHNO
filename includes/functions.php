<?php
	// this file contains some functions
	// including the some files with some global declartions	
		
	function redirect_to($location = NULL){
		if($location !=NULL){
			header("Location: {$location}");
			exit;
		}
	}

	 function check_is_set($val){
		foreach ($val as $key => $value) {
			if(!isset($val[$key]))
				return 0;
				
		}	
		return 1;
	}

	function check_empty($val){
		foreach ($val as $key => $value) {
			if(empty($val[$key]))
				return 0;
		}	
		return 1;
	}
	
	
?>