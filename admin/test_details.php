<?php
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");
	require_once("utils/question.php");
	require_once("utils/user.php");

	if(isset($_POST["submit"])){
		$db = new DB_CONNECT();		

		// get username from the session
		$username = "admin";

		if(check_is_set($_POST)){
			$name = $db->mysql_prep($_POST["name"]);
			$start_time = convert_to_unix_time_stamp($_POST["start_time"]);
			$end_time = convert_to_unix_time($_POST["end_time"]);
			$duration = $db->mysql_prep($_POST["duration"]);

			$query = "Insert into " + TESTS_TABLE + 
					"values('{$name}','{$username}',{$start_time},{$end_time},{$duration})";

			$result = $db->query_database($query);
			if(is_null($result)){
				// query failed
			}else{
				if(!is_null(Question::create_table($name))){
					if(!is_null(User::create_table($name))){
						redirect_to("add_question.php");
					}
				}else{
					echo "Same test exits";
				}								
			}			
		}else{
			echo ("Someting was not set");
		}
	}else{

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
      <div class="container">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 ">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Please enter the test details</h3>
                  </div>
                  <div class="panel-body">
                  <center>
                     <form role="form" method="post" action="tes_details.php">

                        <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                 <input type="text" name="test_name" id="test_name" class="form-control input-sm" placeholder="Test Name"/>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                 <input type="text" name="start_time" id="start_time" class="form-control input-sm" placeholder="Start Time"/>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group">
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                 <input type="text" name="end_time" id="end_time" class="form-control input-sm" placeholder="End Time"/>
                              </div>
                           </div>
                        </div>

                        <br>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                 <input type="password" name="duration" id="duration" class="form-control input-sm" placeholder="Duration"/>
                              </div>
                           </div>
                        </div>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success ">
                        </center>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

