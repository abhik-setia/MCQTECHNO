<?php 
	require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");
    require_once("../includes/session.php");
	confirm_logged_in();	   
	if(!is_null($_GET['test_name'])){
		$test_name = urldecode($_GET['test_name']);
		$db = new DB_CONNECT();
		$username = get_username();
		//$test_name = $db->mysql_prep($_POST["test_name"]);
        
        $query = "DELETE FROM test WHERE username='{$username}' AND test_name='{$test_name}'";
		$result = $db->query_database($query);

		if(is_null($result)){
           // query failed
           echo "query failed";
        }else{
        	$user_table=$test_name."_users";
        	$questions_table=$test_name."_questions";
        	 $query ="DROP TABLE {$user_table} ";
			 $result=$db->query_database($query);

			 $query2 ="DROP TABLE {$questions_table} ";
			 $result2=$db->query_database($query2);
			 var_dump($query2);

			if(!is_null($result) && !is_null($result2)){
        		redirect_to('view_test.php?message=true');
        	}
        }
	}	
 ?>