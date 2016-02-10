<?php 
    require_once'../includes/db_connect.php';
    require_once'../includes/functions.php';
    require_once'../includes/session.php';                  
    confirm_logged_in();

    $db = new DB_CONNECT();      

    // get username from the session
    $username = get_username();
    $test_name = urldecode($_GET['test_name']);

    //select all test created by him from test table

    $query = "SELECT * FROM ".$test_name."_users";
    $users_table = $db->query_database($query);

    if($db->number_of_rows($users_table)>0){
        $i=1;
        while ($row=$db->fetch_array($users_table)){
            $table_data=array();
            $table_data_array[$i]=array();
            $table_data["first_name"]=$row["first_name"];
            $table_data["last_name"]=$row["last_name"];
            $table_data["email"]=$row["email"];
            $table_data["phone_number"]=$row["phone_number"];
            $table_data["score"]=$row["score"];
            $table_data["questions_attempted"]=$row["questions_attempted"];
            $table_data["correct_ans"]=$row["correct_ans"];
            $table_data["wrong_ans"]=$row["wrong_ans"];
            $table_data_array[$i]=$table_data; 
            $i++;
        }
        $no_of_rows=$i-1;
        $table_data_array["number_of_rows"]=$no_of_rows;
        $table_html=make_users_table();
    }else{
        //echo " No tables created by admin";
    }                      
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title> Users Table
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      
   </head>
   <body>
   <?php include("../includes/header.php"); ?>
   <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
            <a href="view_test.php" class="btn btn-info ">
              <span class="glyphicon glyphicon-menu-left"></span> Back
            </a>
            Users registered for event <b><?php echo $test_name; ?></b>
            <a href="export.php?test_name=<?php echo $_GET['test_name'];?>" target="_blank"class="btn btn-info btn-xs pull-right" >Export to Excel Sheet</a>
        </div>
          <div class="panel-body">
             <table class="table table-hover table-striped">
                 <thead>
                   <tr>
                     <th>S.no</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Phone number</th>
                     <th>Score</th>
                     <th>Questions Attempted</th>
                     <th>Correct Answers</th>
                     <th>Wrong Answers</th>
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
