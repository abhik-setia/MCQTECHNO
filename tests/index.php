<?php
	require_once('../includes/db_connect.php');
	require_once('../includes/config.php');
	require_once('../includes/session.php');
	require_once('../includes/functions.php');

	if(isset($_GET["test_name"])){
		$test_name = $_GET["test_name"];
		$query = "Select * from " . TESTS_TABLE . " where test_name='{$test_name}'";
		$result = $db->query_database($query);
		if($result != NULL){
			if($db->number_of_rows($result) > 0){
				$row = $db->fetch_array($result);
				$test_start_unix_timestamp = strtotime($row["start_time"]);
				$test_end_unix_timestamp = strtotime($row["end_time"]);
				$current_unix_timestamp = strtotime("now");
				if($current_unix_timestamp >= $test_start_unix_timestamp && $current_unix_timestamp <= $test_end_unix_timestamp ){
					set_test_name($test_name);
					set_test_duration($row["duration"]);
					redirect_to("../user/user_registration.php");
				}else if($current_unix_timestamp < $test_start_unix_timestamp){
					set_error_message(TEST_NOT_STARTED);					
					redirect_to("error.php");
				}else if($current_unix_timestamp > $test_end_unix_timestamp){								
					set_error_message(TEST_HAS_ENDED);					
					redirect_to("error.php");
				}
			}
		}else{
			set_error_message(TEST_NAME_NOT_FOUND);
			redirect_to("error.php");
		}
	}else{
		set_error_message(TEST_NAME_NOT_FOUND);
		redirect_to("error.php");
	}
?>