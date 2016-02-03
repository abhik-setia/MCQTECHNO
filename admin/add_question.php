<?php
  require_once("../includes/db_connect.php");
  require_once("../includes/functions.php");
  require_once("../includes/session.php");
  

  if(isset($_GET["message"])){
    $message = "The question has been added";
  }

  if(isset($_POST["submit"])){
    $db = new DB_CONNECT();       
    $keys = array( "question", "option1", "option2", "option3", 
            "option4", "radio", "marks", "negative_marks" );

    if( !array_diff($keys, array_keys($_POST)) && check_is_set($_POST)){
      $question = $db->mysql_prep($_POST["question"]);      
      $option1 = $db->mysql_prep($_POST["option1"]);
      $option2 = $db->mysql_prep($_POST["option2"]);
      $option3 = $db->mysql_prep($_POST["option3"]);
      $option4 = $db->mysql_prep($_POST["option4"]);
      $correct_ans = $db->mysql_prep($_POST["radio"]);      
      $marks = $db->mysql_prep($_POST["marks"]);
      $negative_marks = $db->mysql_prep($_POST["negative_marks"]);            
      $table_name = get_test_name() . "_questions";     

      $query = "Insert into " . $table_name . 
      " VALUES('{$question}','{$option1}','{$option2}', '{$option3}', '{$option4}', '{$correct_ans}', '{$marks}', '{$negative_marks}')";      

      if(!is_null($db->query_database($query))){
        redirect_to("add_question.php?message=true");
      }else{
        echo ("Question cannot be added");
      }

    }else{
      $message = "Someting was not set";
    }
  }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Add Question</title>
         <?php
            include("admin_includes/head_section.php");
         ?>
   </head>

    <style>
      .spaceX{
         margin-left:3%; 
      }
    </style>   

   <body>
        <?php include("../includes/header.php");
          global $message;
          if(check_var($message)){
            echo(show_message($message));
          }
        ?>
      <div class="container">       
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-7 col-md-7 centering">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Please Enter Question Details</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="add_question.php">

                        <fieldset class="form-group">
                            <label for="Question">Your Question ?</label>
                            <textarea class="form-control" name="question" required id="Question" placeholder="Enter question" rows="10"></textarea>
                        </fieldset>
                        <div class="c-inputs-stacked">
                          <p> Mark the option which is correct.</p>                          

                          <?php                               
                            for($i=1 ; $i<= 4; $i++){
                              echo"<br>
                                    <div class=\"row\">
                                        <div class=\"form-group spaceX\">
                                            <input id=\"option{$i}\" name=\"radio\" required value=\"option{$i}\" type=\"radio\" style=\"float:left\">
                                            <span class=\"col-lg-10\" style=\"float:left\">
                                            <input type=\"text\" name=\"option{$i}\" required class=\"form-control input-sm\" placeholder=\"Option {$i}\"/>
                                            </span>
                                        </div>
                                  </div>";
                            }

                          ?>                        

                          <br>
                          <div class="row">
                                <div class="form-group spaceX">
                                    Marks
                                    <span class="col-lg-2" style="float:left" >
                                    <input type="number" name="marks" required class="form-control input-sm"/>
                                    </span>
                                </div>
                          </div>
                          <br>

                          <div class="row">
                                <div class="form-group spaceX">
                                    Negative Marks
                                    <span class="col-lg-2">
                                    <input type="number" name="negative_marks" class="form-control input-sm"/>
                                    </span>
                                </div>
                          </div>
                          <br>

                        </div>
                        <center>
                        <input type="submit" value="Add Question" name="submit" class="btn  btn-lg btn-success"> 
                        </center>                       
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
