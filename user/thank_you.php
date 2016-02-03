<?php
    require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");    
    require_once("../includes/session.php");    
    
    $test_name = get_test_name();
    $test_user_name = get_test_username();
    
    $file = fopen("../tests/" . $test_name . "/" . $test_user_name . ".txt","wb");
    $content_to_write = "";    

    // calculate the result    
    $number_of_questions = $_COOKIE[md5("number_of_questions")];
    $score = 0;
    $number_of_correct_ans = 0;
    $number_of_wrong_ans = 0;
    $number_of_unattempted_questions = 0;
    $data_to_write = "";    
    $correct_ans = ""; $marks = "";

    for($i = 1 ; $i <= $number_of_questions; $i++){        
        $your_ans = "";
        $correct_ans = $_COOKIE[md5("correct_ans".$i)];
        if(isset($_COOKIE[$i])){            
            $user_response = md5($_COOKIE[$i]);
            $marks = $_COOKIE[md5("marks".$i)];
            $negative_marks = $_COOKIE[md5("negative_marks".$i)];            
            $your_ans = $_COOKIE[$i];            
            if(strcmp($correct_ans, $user_response) == 0){
                $score += $marks;
                $number_of_correct_ans++;                
            }else{
                $score -= $negative_marks;
                $number_of_wrong_ans++;  
                $marks = $negative_marks;
            }
        }else{
            $number_of_unattempted_questions++;
            $your_ans = "Not attempted";
            $marks = 0;
        }
        $content_to_write .= "{$i}. Your Ans : {$your_ans} ". PHP_EOL 
                            . "{$i}. Correct Answer : {$correct_ans} " . PHP_EOL  
                            . "Marks Scored : {$marks}" . PHP_EOL ;
    }

    $number_of_attempted_questions = $number_of_questions - $number_of_unattempted_questions;

    $test_users_table = get_test_name() . "_users";
    $query = "Update " . $test_users_table . " set score={$score} , correct_ans={$number_of_correct_ans},
              wrong_ans={$number_of_wrong_ans}, questions_attempted={$number_of_attempted_questions}
              WHERE email = '{$test_user_name}' ";
    
    $content_to_write = "Total Questions : {$number_of_questions}" . PHP_EOL .
                        "Questions Attempted : {$number_of_attempted_questions}" . PHP_EOL . 
                        "Questions Unattempted : {$number_of_unattempted_questions}". PHP_EOL . 
                        $content_to_write ;

    fwrite($file, $content_to_write);
    fclose($file);

    $result = $db->query_database($query);          
    if($result != NULL){
        if($db->rows_affected($result)!=0){
            // do nothing
        }
    }else{
        echo "Query failed";
    }
?>

<!DOCTYPE html>
<html>
   <head>
      <title> Thank You</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/final_test.css">  
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
      <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
   </head>
   <body>
        <?php include("../includes/header.php"); ?>

        <div class="container" style="font-family: 'Titillium Web', sans-serif;">
            <div class="panel panel-success" >
                <div class="panel-heading">
                <h2>
                    Thank You!! for taking part in <?php echo get_test_name();?> :)
                </h2>
            </div>
            <div class="panel-body ">
                <li class="list-group-item"><h3>Your Score : <?php global $score; echo $score; ?></h3></li>
                <li class="list-group-item"><h3>Correct Answers : <?php global $number_of_correct_ans; echo $number_of_correct_ans; ?></h3></li>
                <li class="list-group-item"><h3>Wrong Answers : <?php global $number_of_wrong_ans; echo $number_of_wrong_ans; ?></h3></li>
                <li class="list-group-item"><h3>Attempted Questions : <?php global $number_of_attempted_questions; echo $number_of_attempted_questions; ?></h3></li>
                <li class="list-group-item"><h3>Unattempted Questions : <?php global $number_of_unattempted_questions; echo $number_of_unattempted_questions; ?></h3></li>            
             </div>
          </div>
         </div>

        <div class="container" >
            <pre style="font-family: 'Pacifico', cursive; font-size:1.8em;">“It’s impossible,” said pride. “It’s risky,” said experience. “It’s pointless,” said reason. “Give it a try,”      whispered the heart.</pre>
        </div>
    </body>
</html>
