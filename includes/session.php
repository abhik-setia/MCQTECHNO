<?php		
	session_start();

	function logged_in(){
		return isset($_SESSION['username']) && !is_null($_SESSION["username"]);
	}
	
	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to('admin_login.php');
		}
	}

	function logout(){
		//session_destroy();	
	}
	
	function set_test_name($test_name){
		$_SESSION["test_name"] = $test_name;
	}

	function get_test_name(){
		if(isset($_SESSION["test_name"]))		
			return $_SESSION["test_name"];
		return NULL;
	}

	function get_username(){
		if(isset($_SESSION["username"]))
			return $_SESSION["username"];
		return NULL;
	}

	function set_username($username){
		$_SESSION["username"] = $username;
	}

	function get_test_username(){
		if(isset($_SESSION["test_username"]))
			return $_SESSION["test_username"];
		return NULL;		
	}

	function set_test_username($test_username){
		$_SESSION["test_username"] = $test_username;
	}

	function get_test_duration(){
		if(isset($_SESSION["test_duration"]))
			return $_SESSION["test_duration"];			
		return NULL;
	}

	function set_test_duration($duration){
		$_SESSION["test_duration"] = $duration * 60; // time stored in the seconds	
	}

	function set_error_message($message){
		$_SESSION["error_message"] =  $message;
	}

	function get_error_message(){
		if(isset($_SESSION["error_message"])){
			return $_SESSION["error_message"];
		}
		return NULL;
	}
?>