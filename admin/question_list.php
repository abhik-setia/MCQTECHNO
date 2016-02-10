<?php 
    require_once'../includes/db_connect.php';
    require_once'../includes/functions.php';
     require_once'../includes/session.php';                  
                 
   $db = new DB_CONNECT();      
   confirm_logged_in();
   // get username from the session
   $username = get_username();
   $decode_url=urldecode($_GET['test_name']);

    set_test_name($decode_url);
    //select all test created by him from test table

   $query = "SELECT * FROM ".$decode_url."_questions";
   $users_table=$db->query_database($query);

    if($db->number_of_rows($users_table)>0)
    {
      $i=1;
      while ($row=$db->fetch_array($users_table)){

        $table_data=array();
        $table_data_array[$i]=array();
        $table_data["question_id"]=$row["id"];
        $table_data["question"]=$row["question"];
        $table_data["option1"]=$row["option1"];
        $table_data["option2"]=$row["option2"];
        $table_data["option3"]=$row["option3"];
        $table_data["option4"]=$row["option4"];
        $table_data["correct_ans"]=$row["correct_ans"];
        $table_data["marks"]=$row["marks"];
        $table_data["negative_marks"]=$row["negative_marks"];
        $table_data_array[$i]=$table_data; 
        $i++;

      }

    $no_of_rows=$i-1;
    $table_data_array["number_of_rows"]=$no_of_rows;
    $table_html=get_questions_table($decode_url);

    } 
    else{
      //echo " No tables created by admin";
    }                      

 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Question List
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
       <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
    
   </head>
   <body>
   <?php include("../includes/header.php"); ?>
   <div class="container-fluid" style="font-family: 'Titillium Web', sans-serif;">
      <div class="panel panel-default">
        <div class="panel-heading"> <a href="view_test.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-menu-left"></span> Back
        </a> &nbsp;&nbsp; <a href="add_question.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-plus"></span> Add Question
        </a> &nbsp;&nbsp; 
        <a href="edit_test_details.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-edit"></span> Edit Test Details
        </a> &nbsp;&nbsp;Edit Mode for test <b><?php echo $decode_url; ?></b></div>
          <div class="panel-body">
             <table class="table table-hover table-striped">
                 <thead>
                   <tr>
                     <th>S.no</th>
                     <th>Question</th>
                     <th>Option1</th>
                     <th>Option2</th>
                     <th>Option3</th>
                     <th>Option4</th>
                     <th>Correct Answers</th>
                     <th>Marks</th>
                     <th>Negative Marks</th>
                     <th>Edit</th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php 
                     global $table_html;
                     echo $table_html;
                  ?>
                 </tbody>
               </table>
          </div>
      </div>
   </div>
   </body>
</html>
