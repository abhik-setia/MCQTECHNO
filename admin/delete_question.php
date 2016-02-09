<?php 
	require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");
    require_once("../includes/session.php");
    
   	confirm_logged_in();

	if(!is_null($_GET['question_id'])){
		$test_name=urldecode($_GET['test_name']);
		$question_id=$_GET["question_id"];
		$db=new DB_CONNECT();
		$username = get_username();
		//$test_name = $db->mysql_prep($_POST["test_name"]);
        $table_name=$test_name."_questions";
        $query ="DELETE FROM ".$table_name." WHERE id='{$question_id}'";
		$result=$db->query_database($query);

		if(is_null($result)){
           // query failed
           echo "query failed";
        }else{
				redirect_to('question_list.php?test_name={$test_name}');
        }        
	}	
?>