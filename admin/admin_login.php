<?php 
	require_once'../includes/db_connect.php';
	require_once'../includes/functions.php';

	if(isset($_POST["submit"]))
	{
		if(check_is_set($_POST))
		{
			if(check_empty($_POST))
			{
				$username=trim($_POST['username']);
				$password=trim($_POST['password']);

				if(!empty($username) && !empty($password))
				{
					$username=$db->mysql_prep($username);
					$password=$db->mysql_prep($password);
					$db->connect();
               $query = "SELECT username,password FROM admin where username='{$username}' AND password='{$password}'";
					$user=$db->query_database($query);
					
					if(is_null($db->fetch_array($user)))
					{
						echo "Incorrect details";

					}else{
                  require_once'../includes/session.php';                  
                  set_username($username);
						redirect_to('create_test.php');
					}
				}
				else{
					echo "please enter details correctly";
				}

			}else{
				echo "fields are empty";
			}
		}else{
			echo "Data not set";
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
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <style type="text/css">
      .spaceX{
         margin-left:18%; 
      }
      </style>
   </head>
   <body>
   <?php include("../includes/header.php"); ?>
      <div class="container">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-sm-offset-2 ">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Hello Admin , Please Login to continue</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="">
                         <div class="row">
                           <label for="username" class=" spaceX"style="float:left">Username</label>    
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                              <div class="form-group">
                              	 <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username"/>
                              </div>
                           </div>
                        </div>
                         <div class="row">
                           <label for="password" class=" spaceX"style="float:left">Password</label>    
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                              <div class="form-group">
                              	 <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"/>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                        	<div>
                        	<input type="submit" value="Login" name="submit" class="btn btn-success col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        	</div>
                        </div>

                     </form>


                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
