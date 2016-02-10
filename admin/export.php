<?php

	require_once("../includes/db_connect.php");
    require_once("../includes/functions.php"); 
    require_once("../includes/session.php");

	function export_excel($table){
	 	global $db;
		$filename = "uploads/{$table}".strtotime("now").'.csv';
		 
		$sql = $db->query_database("SELECT * FROM $table");
		 
		$num_rows = $db->number_of_rows($sql);
		if($num_rows >= 1){
			$row = $db->fetch_as_associate_array($sql);
			$fp = fopen($filename, "w");
			$seperator = "Sno.";
			$comma = ",";
		 
			foreach ($row as $name => $value){
				$seperator .= $comma . '' .str_replace('', '""', $name);
				$comma = ",";
			}
		 
			$seperator .= "\n";
			fputs($fp, $seperator);
		 
			$db->data_seek($sql, 0);
			$row_number = 1;
			while($row = $db->fetch_as_associate_array($sql)){
				$seperator = "{$row_number}";
				$comma = ",";
	 
				foreach ($row as $name => $value){
					$seperator .= $comma . '' .str_replace('', '""', $value);
					$comma = ",";
				}

				$row_number++;	
	 
				$seperator .= "\n";
				fputs($fp, $seperator);
			}
		 
			fclose($fp);
			echo "Your file is ready. You can download it from <a href='$filename'>here!</a>";
		}
		else{
			echo "There is no record in your Database";
		}
	} 

	$test_name = $_GET["test_name"];
	$table = $test_name . "_users";
	export_excel($table);
?>