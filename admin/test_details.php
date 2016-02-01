<?php
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");
	require_once("../includes/session.php");
	require_once("utils/question.php");
	require_once("utils/user.php");

	if(isset($_POST["submit"])){
		$db = new DB_CONNECT();		

		// get username from the session
		$username = get_username();

		if(check_is_set($_POST)){

			if(check_empty($_POST)){
				$name = $db->mysql_prep($_POST["test_name"]);
				//$start_time = convert_to_unix_time_stamp($_POST["start_time"]);
				//$end_time = convert_to_unix_time($_POST["end_time"]);
				$event_date=$db->mysql_prep($_POST["event_date"]);
				$duration = $db->mysql_prep($_POST["duration"]);

				
				$query = "Insert into ".TESTS_TABLE." (username,test_name,event_date,duration) ".
						"values('{$username}','{$name}','{$event_date}',{$duration})";

				$result = $db->query_database($query);
				if(is_null($result)){
					// query failed
					echo "query failed";
				}else{
					if(!is_null(Question::create_table($name))){
						if(!is_null(User::create_table($name))){
							set_test_name($name);                     
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
      <title>
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/common.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
   </head>
   <body>
   <?php include '../includes/header.php'; ?>
      <div class="container">
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
                                 <input type="text" name="test_name" id="test_name" class="form-control input-sm" placeholder="Test Name"/>
                              </div>
                           </div>
                        </div>

                      <!--   <div class="row">
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-offset-3 col-md-offset-3">
                              <div class="form-group">
                                 <input type="date" name="start_time" id="start_time" class="form-control input-sm" placeholder="Start Time"/>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group">
                              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-offset-3 col-md-offset-3">
                                 <input type="text" name="end_time" id="end_time" class="form-control input-sm" placeholder="End Time"/>
                              </div>
                           </div>
                        </div>
 -->
 						 <div class="row">
                           <div class="form-group">
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                                 <a href="#" data-toggle="tooltip" title="Date of event">
                                 <input type="date" name="event_date" id="event_date" class="form-control input-sm" placeholder="Event Date"/>
                                 </a>
                              </div>
                           </div>
                        </div>
 
                        
                        <div class="row">
                           <div class="form-group">
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                                 <input type="number" name="duration" id="duration" class="form-control input-sm" placeholder="Duration(in mins)"/>
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
