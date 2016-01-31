<?php	
		
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
	
	function check_var($var){		
		return (isset($var) && !empty($var));
	}

	function show_message($message){
		$message_box = "<div class=\"container\" style=\"margin-top:6%;\"><div class=\"alert alert-warning alert-dismissible\" role=\"alert\" id=\"alertMessage\">
  		<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
  			<span aria-hidden=\"true\" id=\"closeButton\">&times;</span>
  		</button> {$message}
		</div></div>";
		return $message_box;
	}
	
?>