<?php
   require_once("../includes/db_connect.php");
   require_once("../includes/functions.php");
   require_once("../includes/session.php");
   require_once("utils/question.php");
   require_once("utils/user.php");

    confirm_logged_in();

   if(isset($_POST["submit"])){
      $db = new DB_CONNECT();    

      // get username from the session
      $username = get_username();

      if(check_is_set($_POST)){

         if(check_empty($_POST)){
            $test_name = $db->mysql_prep($_POST["test_name"]);
            $start_time = convert_to_unix_time_stamp($_POST["start_time"]);
            $end_time = convert_to_unix_time($_POST["end_time"]);
            $event_date=$db->mysql_prep($_POST["event_date"]);
            $duration = $db->mysql_prep($_POST["duration"]);
            
            $query = "Insert into ". TESTS_TABLE ." (username,test_name,start_time,end_time,event_date,duration) ".
                  "values('{$username}','{}'{$test_name}','{$event_date}',{$duration})";

            $result = $db->query_database($query);
            if(is_null($result)){
               // query failed
               echo "query failed";
            }else{
               if(!is_null(Question::create_table($test_name))){
                  if(!is_null(User::create_table($test_name))){
                     // create the test folder
                     if(!mkdir("../tests/".$test_name)){                        
                        echo "Unable to create the directory";
                     }
                     set_test_name($test_name);                     
                     redirect_to("add_question.php");
                  }
               }else{
                  echo "Same test exits";
               }                       
            }
         }else{
            echo "empty fields";
         }        
      }else{
         echo ("Someting was not set");
      }
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title> Test Details</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <script type="text/javascript" src=" ../js/moment.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/common.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      
      <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/jquery-ui-timepicker-addon.css">      
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datetimepicker();
            
         });
      </script>
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      

   </head>
   <body>
   <?php include '../includes/header2.php'; ?>
      <div class="container" style="font-family: 'Titillium Web', sans-serif;">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 centering">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Please Enter the Test details</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="">
                        
                        <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                              <div class="form-group">
                                 <input type="text" name="test_name" id="test_name" required class="form-control input-sm" placeholder="Test Name"/>
                              </div>
                           </div>
                        </div>

                         
 
                   <!-- <div class="row">
                           <div class="form-group">
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering" >
                                 <a href="#" data-toggle="tooltip" title="Date of event">
                                 <input type="text" name="event_date" id="datepicker-13" class="form-control input-sm" placeholder="Event Date"/>
                                 
                                 </a>

                              </div>
                           </div>
                   </div> -->
                     
                     <div class="row">
                             <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 centering'>
                                 <div class="form-group">
                                     <div class='input-group date' id='datetimepicker1'>
                                         <input type='text' class="form-control" name="event_date" id="event_date" placeholder="Event Date " />
                                         <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <script type="text/javascript">
                                 $(function () {
                                     $('#datetimepicker1').datetimepicker();
                                 });
                             </script>
                         </div>

                  <div class="row">
                             <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 centering'>
                                 <div class="form-group">
                                     <div class='input-group date' id='datetimepicker2'>
                                         <input type='text' class="form-control" name="start_time" id="start_time" placeholder="Start Time " />
                                         <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <script type="text/javascript">
                                 $(function () {
                                     $('#datetimepicker2').datetimepicker();
                                 });
                             </script>
                         </div>


                         <div class="row">
                             <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 centering'>
                                 <div class="form-group">
                                     <div class='input-group date' id='datetimepicker3'>
                                         <input type='text' class="form-control" name="end_time" id="end_time" placeholder="End Time "/>
                                         <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <script type="text/javascript">
                                 $(function () {
                                     $('#datetimepicker3').datetimepicker();
                                 });
                             </script>
                         </div>
                     

                        
                        <div class="row">
                           <div class="form-group">
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                                 <input type="number" name="duration" required id="duration" class="form-control input-sm" placeholder="Duration(in mins)"/>
                              </div>
                           </div>
                        </div>

                          <center> 
                        <input type="submit" value="Create Test" name="submit" class="btn btn-success">
                        </center>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
