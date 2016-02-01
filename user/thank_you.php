<?php
    require_once("../includes/db_connect.php");
    include("../includes/functions.php");    
    // calculate the result    
    $number_of_questions = $_COOKIE[md5("number_of_questions")];
    
    $score = 0;
    $number_of_correct_ans = 0;
    $number_of_wrong_ans = 0;
    $number_of_unattempted_questions = 0;
    for($i = 1 ; $i <= $number_of_questions; $i++){

        if(isset($_COOKIE[$i])){
            $user_response = md5($_COOKIE[$i]);
            $marks = $_COOKIE[md5("marks".$i)];
            $negative_marks = $_COOKIE[md5("negative_marks".$i)];
            $correct_ans = $_COOKIE[md5("correct_ans".$i)];
            if(strcmp($correct_ans, $user_response) == 0){
                $score += $marks;
                $number_of_correct_ans++;
            }else{
                $score -= $negative_marks;
                $number_of_wrong_ans++;
            }
        }else{
            $number_of_unattempted_questions++;
        }
    }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      
   </head>
   <body>
   <?php include("../includes/header.php"); ?>

   <div class="container">
      <div class="panel panel-success">
         <div class="panel-heading">
          <h2>
             Thank You!! for taking part in TechSpardha Event :)
          </h2>
         </div>
         <div class="panel-body">
            <h3>Your Score : <?php global $score; echo $score; ?></h3>
            <h4>Correct Answers : <?php global $number_of_correct_ans; echo $number_of_correct_ans; ?></h3>
            <h4>Wrong Answers : <?php global $number_of_wrong_ans; echo $number_of_wrong_ans; ?></h3>
            <h4>Unattempted Questions : <?php global $number_of_unattempted_questions; echo $number_of_unattempted_questions; ?></h3>            
         </div>
      </div>
     </div> 
   </body>
</html>
