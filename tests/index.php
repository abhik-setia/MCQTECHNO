<?php
	require_once('../includes/db_connect.php');
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
					redirect_to("../user/user_registration.php");
				}else if($current_unix_timestamp < $test_start_unix_timestamp){
					$_SESSION["message_test_time_not_correct"] = "The test have not started yet";					
					redirect_to("error.php");
				}else if($current_unix_timestamp < $test_start_unix_timestamp){								
					$_SESSION["message_test_time_not_correct"] = "The test has ended :P";									
					redirect_to("error.php");
				}
			}
		}else{

		}
	}else{

	}
?>