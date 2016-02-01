<?php 
    require_once'../includes/db_connect.php';
    require_once'../includes/functions.php';

    if(isset($_POST["register"])){

        if(check_empty($_POST)){
            $first_name = $db->mysql_prep(trim($_POST['first_name']));
            $last_name = $db->mysql_prep(trim($_POST['last_name']));
            $email = $db->mysql_prep(trim($_POST['email']));
            $phone_number = $db->mysql_prep(trim($_POST['phone_number']));                             
            $user_test_table = "abc" . "_users";

            // $user_test_table = get_test_name() . "_users";

            $query = "Insert into ". $user_test_table ." (first_name, last_name, email, phone_number) ".
                  " values('{$first_name}', '{$last_name}', '{$email}', '{$phone_number}')";
            $result = $db->query_database($query);
            if(!is_null($result)){
                redirect_to("rules_regulations.php");
            }else{
                echo("Query failed");
            }
        }else{
            echo "empty fields";
        }
    }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>User Registration</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <script type="text/javascript" src="../js/bootstrap-formhelpers-phone.js"></script>
       <script type="text/javascript" src="../js/common.js"></script>
   </head>

   <body>
   <?php include '../includes/header.php'; ?>
   <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 centering ">
         <div class="panel panel-default">
            <div class="panel-heading">
                  <h3 class="panel-title">Please Register here to proceed furter</h3>
                  </div>
                  <div class="panel-body">
                  <form role="form" method="post" action="">

                     <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                           <a href="#" data-toggle="tooltip" title="First Name Please :D">
                         <input type="text" name="first_name" id="first_name" required class="form-control input-sm" placeholder="First Name">
                           </div>
                        </div>
                      </div>
                      
                      <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <a href="#" data-toggle="tooltip" title="Last Name Please :D">
                        
                              <input type="text" name="last_name" id="last_name" required class="form-control input-sm" placeholder="Last Name">
                           </div>
                        </div>
                     </div>

                      <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <a href="#" data-toggle="tooltip" title=" Email Please :D">                        
                              <input type="email" name="email" id="email" required class="form-control input-sm" placeholder=" Your Email  :)">
                           </div>
                        </div>
                     </div>

                       <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <a href="#" data-toggle="tooltip" title="Phone no Please :D">                        
                              <input type="tel" name="phone_number" id="phone_number" required class="form-control input-sm" placeholder=" Your Mobile number">
                           </div>
                        </div>
                     </div>
                     <center>
                      <a href="#" data-toggle="tooltip" >
                        
                     <input type="submit" type="tel" name="register" value="Register" class="btn btn-info ">
                     </center>
                  </form>
               </div>
            </div>
         </div>
      </div>
    </div>
 </body>