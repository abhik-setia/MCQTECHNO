<?php 
    require_once'../includes/db_connect.php';
    require_once'../includes/functions.php';
     require_once'../includes/session.php';                                   
   $db = new DB_CONNECT();      
   // get username from the session
   $username = get_username();
   //select all test created by him from test table
   $query = "SELECT test_name,start_time,end_time,event_date,duration FROM test WHERE username='{$username}'";
   $admin_tests=$db->query_database($query);
    if($db->number_of_rows($admin_tests) >0)
    {
      $i=1;
      while ($row=$db->fetch_array($admin_tests)){
        $table_data=array();
        $table_data_array[$i]=array();
        $table_data["test_name"]=$row["test_name"];
        $table_data["start_time"]=$row["start_time"];
        $table_data["end_time"]=$row["end_time"];
        $table_data["event_date"]=$row["event_date"];
        $table_data["duration"]=$row["duration"];
        $table_data_array[$i]=$table_data; 
        $i++;
      }
    $no_of_rows=$i-1;
    $table_data_array["number_of_rows"]=$no_of_rows;
    $table_html=make_test_information_table();
    } 
    else{
      echo " No tables created by admin";
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
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
   </head>
   <body>
   <?php include("../includes/header.php"); ?>
   <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">List of tests created by <?php $username?></div>
          <div class="panel-body">
             <table class="table table-hover table-striped">
                 <thead>
                   <tr>
                     <th>Test Name</th>
                     <th>Start Time</th>
                     <th>End Time</th>
                     <th>Event Date</th>
                     <th>Duration</th>
                     <th>Options</th>
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