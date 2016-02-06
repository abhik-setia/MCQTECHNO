<?php 
	 require_once("../includes/session.php");
	 require_once'../includes/functions.php';

	//check if user session is on 
	if(!is_null(logged_in()))
	{
		//user is active
		logout();
		foreach ($_SESSION as $key => $value) {
			unset($key);
		}
		redirect_to('admin_login.php?message=true');
	}else{
		echo "Please Login to continue";
	}


 ?>