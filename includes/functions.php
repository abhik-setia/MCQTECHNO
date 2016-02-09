<?php	
	
	function remove_all_cookies(){		
		foreach ($_COOKIE as $key => $value){			
    		unset($value);
    		setcookie($key, null, -1, '/');    		
		}
	}

	function make_sql_date_time($string){		
		$array_of_strings = explode("/", $string);		
		$month = $array_of_strings[0];
		$day = $array_of_strings[1];
		$new_array = explode(" ",$array_of_strings[2]);
		$year = $new_array[0];
		$am_pm = $new_array[2];
		$time_array = explode(":", $new_array[1]);
		$hours = $time_array[0];
		$minutes = $time_array[1];
		if(strcmp($am_pm,"PM") == 0){
			$hours = strval(intval($hours)+12);
		}else{
			$hours = "0" . $hours;
		}
		return $year . "-" . $month . "-" . $day . " " . "{$hours}:{$minutes}:00"; 

	}

	function redirect_to($location = NULL){
		if($location !=NULL){
			header("Location: {$location}");
			exit;
		}
	}

	function check_is_set($val){	 	
		foreach ($val as $key => $value){			
			if(!isset($val[$key]))
				return 0;				
		}	
		return 1;
	}

	function check_empty($val){
		foreach ($val as $key => $value){
			if(empty($val[$key]))
				return 0;
		}	
		return 1;
	}
	
	function check_var($var){		
		return (isset($var) && !empty($var));
	}

	function convert_to_unix_time($time){
		return strftime("m/d/Y h:i A",$time);
	}

	function show_message($message){
		$message_box = "<div class=\"container\" id=\"message_container\" style=\"margin-top:6%;\"><div class=\"alert alert-warning alert-dismissible\" role=\"alert\" id=\"alertMessage\">
  		<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
  			<span aria-hidden=\"true\" id=\"closeButton\">&times;</span>
  		</button> {$message}
		</div></div>";
		return $message_box;
	}
	
	function make_questions(){
		global $questions_array; 				
		$number_of_questions = $questions_array["number_of_questions"];
		$output = "";
		for($i=1; $i<=$number_of_questions; $i++ ){		
			$question = $questions_array[$i];
			$marks=$question["marks"];
			$negative_marks=$question["negative_marks"];

                $output .= "<div class=\"panel panel-primary\">
                <div class=\"panel-heading\">
                   <h4 class=\"panel-title\" id=\"glyphicon{$i}\">
                      <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{$i}\" >
                      Question {$i}   <span class=\"pull-right\">Marks : {$marks}  &nbsp;&nbsp; Negative Marks : {$negative_marks}</span></a>
                   </h4>
                </div>
                <div id=\"collapse{$i}\" class=\"panel-collapse collapse\">
                   <div class=\"panel-body\"><pre><code>" . $question["question"] . "</code></pre></div>
                   <div class=\"radio spaceRadio  \">
                      <label><input type=\"radio\" onclick= \"record_ans({$i},1)\" name=\"q{$i}op\">". $question["option1"] ."</label>
                   </div>
                   <div class=\"radio spaceRadio\">
                      <label><input type=\"radio\" onclick=\"record_ans({$i},2)\" name=\"q{$i}op\">". $question["option2"] ."</label>
                   </div>
                   <div class=\"radio spaceRadio\">
                      <label><input type=\"radio\" onclick=\"record_ans({$i},3)\" name=\"q{$i}op\">". $question["option3"] ."</label>
                   </div>
                   <div class=\"radio spaceRadio\">
                      <label><input type=\"radio\" onclick=\"record_ans({$i},4)\" name=\"q{$i}op\">". $question["option4"] ."</label>
                   </div>

                   <a type=\"button\" style=\"visibility:hidden;\" value=\"Reset\" id=\"reset_button_{$i}\" class=\"btn btn-info spaceReset\" onclick=\"reset_question($i)\">Reset</a>
                    
                </div>

             </div> ";             
        }
        return $output;
	}

	function make_test_information_table(){
		global $table_data_array;
		$no_of_rows=$table_data_array["number_of_rows"];
		$output="";

		for ($i=1; $i<=$no_of_rows; $i++) { 
			$table_data=$table_data_array[$i];
			
			$output.="<tr>
                      <td>".$table_data["test_name"]."</td>
                      <td>".$table_data["start_time"]."</td>
                      <td>".$table_data["end_time"]."</td>
                      <td>".$table_data["event_date"]."</td>
                      <td>".$table_data["duration"]."</td>
                      <td><a href=\"view_users_of_table.php?test_name={$table_data["test_name"]}\">View Users</a></td>
                      <td><a href=\"question_list.php?test_name={$table_data["test_name"]}\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>                     
		              <td><a href=\"delete_test.php?test_name={$table_data["test_name"]}\" onclick=\"return confirm('Are you sure you want to delete this test?');\" ><span class=\"glyphicon glyphicon-trash\"></span></a></td>                     
                      </tr>";
		}
		return $output;
	}			

	function make_users_table(){
		global $table_data_array;
		$no_of_rows=$table_data_array["number_of_rows"];
		$output="";

		for ($i=1; $i<=$no_of_rows; $i++) { 
			$table_data=$table_data_array[$i];
			
			$output.="<tr>
					  <td>{$i}</td>
                      <td>".$table_data["first_name"]."</td>
                      <td>".$table_data["last_name"]."</td>
                      <td>".$table_data["email"]."</td>
                      <td>".$table_data["phone_number"]."</td>
                      <td>".$table_data["score"]."</td>
                      <td>".$table_data["questions_attempted"]."</td>
                      <td>".$table_data["correct_ans"]."</td>
                      <td>".$table_data["wrong_ans"]."</td>
                      </tr>";
		}
		return $output;
	}

	function get_questions_table($testname){
		global $table_data_array;
		$no_of_rows=$table_data_array["number_of_rows"];
		$output="";
		$url=$testname;
		for ($i=1; $i<=$no_of_rows; $i++) { 
			$table_data=$table_data_array[$i];
			
			$output.="<tr>
					  <td>{$i}</td>
		              <td>".$table_data["question"]."</td>
		              <td>".$table_data["option1"]."</td>
		              <td>".$table_data["option2"]."</td>
		              <td>".$table_data["option3"]."</td>
		              <td>".$table_data["option4"]."</td>
		              <td>".$table_data["correct_ans"]."</td>
		              <td>".$table_data["marks"]."</td>
		              <td>".$table_data["negative_marks"]."</td>
		              <td><a href=\"edit_question.php?question_id={$table_data["question_id"]}&test_name={$url}\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>                     
		               <td><a href=\"delete_question.php?question_id={$table_data["question_id"]}&test_name={$testname}\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>                     
		              </tr>";
		}
		return $output;

	}
?>