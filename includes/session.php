<?php		
	session_start();
	function logged_in(){
		return isset($_SESSION['username']);
	}
	
	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to('index.php');
		}
	}

	function set_test_name($test_name){
		$_SESSION["test_name"] = $test_name;
		
	}

	function get_test_name(){		
		return $_SESSION["test_name"];
	}

	function get_username(){
		return $_SESSION["username"];
	}

	function set_username($username){
		$_SESSION["username"] = $username;
	}

	function get_test_username(){
		return $_SESSION["get_test_username"];
	}

	function set_test_username($test_username){
		$_SESSION["test_username"] = $test_username;
	}

?>