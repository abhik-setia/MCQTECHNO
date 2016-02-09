<?php 
	 require_once("../includes/session.php");
	 require_once'../includes/functions.php';

	//check if user session is on 

	 $_SESSION["set_username"] = NULL;

	if(!is_null(logged_in())){		
		foreach ($_SESSION as $key => $value) {
			//unset($key);
			$_SESSION[$key] = NULL;
		}
		redirect_to('admin_login.php?message=true');
	}else{
		echo "Please Login to continue";
	}

?>