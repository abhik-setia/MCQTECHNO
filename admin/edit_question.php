<?php
    require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");
    require_once("../includes/session.php");
  
    confirm_logged_in();

    if(isset($_POST["submit"])){
        $question_id = $_POST['question_id'];
        $decode_url = $_POST['test_name'];

   		$table_name=$decode_url."_questions";	
        $table_data=array();
        $table_data["question_id"]=$_POST["question_id"];
        $table_data["question"]=$_POST["question"];
        $table_data["option1"]=$_POST["option1"];
        $table_data["option2"]=$_POST["option2"];
        $table_data["option3"]=$_POST["option3"];
        $table_data["option4"]=$_POST["option4"];
        $table_data["correct_ans"]=$_POST["radio"];
        $table_data["marks"]=$_POST["marks"];
        $table_data["negative_marks"]=$_POST["negative_marks"];
        
        $query = "UPDATE ".$table_name." SET question='{$table_data["question"]}'
        ,option1='{$table_data["option1"]}',option2='{$table_data["option2"]}',
        option3='{$table_data["option3"]}',option4='{$table_data["option4"]}',
        correct_ans='{$table_data["correct_ans"]}',marks='{$table_data["marks"]}',
        negative_marks='{$table_data["negative_marks"]}'  WHERE id={$table_data["question_id"]} ";

        $update_query_result=$db->query_database($query);
        if($update_query_result!=NULL)
            redirect_to("question_list.php?test_name={$decode_url}");

    }else{
        $question_id = $_GET['question_id'];
        $decode_url = $_GET['test_name'];
        $db = new DB_CONNECT();      	
        $query = "SELECT * FROM ".$decode_url."_questions WHERE id='{$question_id}' ";
        $question = $db->query_database($query); 
        if($db->number_of_rows($question) >0){
        	$i = 1;
        	while ($row=$db->fetch_array($question)){
                $table_data = array();
                $table_data_array[$i] = array();
                $table_data["question_id"] = $row["id"];
                $table_data["question"] = $row["question"];
                $table_data["option1"] = $row["option1"];
                $table_data["option2"] = $row["option2"];
                $table_data["option3"] = $row["option3"];
                $table_data["option4"] = $row["option4"];
                $table_data["correct_ans"] = $row["correct_ans"];
                $table_data["marks"] = $row["marks"];
                $table_data["negative_marks"] = $row["negative_marks"];
                $table_data_array[$i] = $table_data; 
                $i++;
        	}
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
         <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'> 
         <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
               
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
      <div class="container" style="font-family: 'Titillium Web', sans-serif;">       
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-7 col-md-7 centering">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Please Enter Question Details</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="">

                        <fieldset class="form-group">
                            <label for="Question">Your Question ?</label>
                            <textarea class="form-control" name="question" required id="Question" placeholder="Enter question" rows="10"><?php echo $table_data["question"]; ?></textarea>
                        </fieldset>
                        <div class="c-inputs-stacked">
                          <p> Mark the option which is correct.</p>                          

                        <?php                               
                            for($i=1 ; $i<= 4; $i++){
                            	$option_value=$table_data["option".$i];
                            	$check_radio="";

                            	if(strcmp($table_data["correct_ans"],"option".$i)==0)
                            	{
                            		$check_radio=" checked=\"true\" ";
                            	}
                              echo"<br>
                                    <div class=\"row\">
                                        <div class=\"form-group spaceX\">
                                            <input id=\"option{$i}\" name=\"radio\" {$check_radio} required value=\"option{$i}\" type=\"radio\" style=\"float:left\">
                                            <span class=\"col-lg-10\" style=\"float:left\">
                                            <input type=\"text\" name=\"option{$i}\" value=\"{$option_value}\"required class=\"form-control input-sm\" placeholder=\"Option {$i}\"/>
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
                                    <input type="number" name="marks" value="<?php echo $table_data["marks"]; ?>" required class="form-control input-sm"/>
                                    </span>
                                </div>
                          </div>
                          <br>

                          <div class="row">
                                <div class="form-group spaceX ">
                                    Negative Marks
                                    <span class="col-lg-2">
                                    <input  type="number" name="negative_marks" value="<?php echo $table_data["negative_marks"]; ?>"class="form-control input-sm"/>
                                    </span>
                                </div>
                          </div>
                          <br>
                           <div class="row">
                                <div class="form-group spaceX hidden">
                                    Negative Marks
                                    <span class="col-lg-2">
                                    <input  type="text" name="test_name" value="<?php echo $decode_url ?>"class="form-control input-sm"/>
                                    </span>
                                </div>
                          </div>
                          <br>
                           <div class="row">
                                <div class="form-group spaceX hidden">
                                    Negative Marks
                                    <span class="col-lg-2">
                                    <input  type="text" name="question_id" value="<?php echo $question_id; ?>"class="form-control input-sm"/>
                                    </span>
                                </div>
                          </div>
                          <br>
                        </div>
                        <center>
                        <input  type="submit" value="Update" name="submit" class="btn  btn-lg btn-success"> 
                        <a href="question_list.php?test_name=<?php echo $decode_url; ?>" class="btn btn-lg btn-danger" role="button">Cancel</a>
                        </center>                       
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
