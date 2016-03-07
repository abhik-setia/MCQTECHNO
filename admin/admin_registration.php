  <?php 
    require_once'../includes/db_connect.php';
    require_once'../includes/config.php';
    require_once'../includes/functions.php';
    require_once'../includes/session.php';

    if(isset($_POST["register"])){
        if(check_empty($_POST)){
            $first_name = $db->mysql_prep(trim($_POST['first_name']));
            $last_name = $db->mysql_prep(trim($_POST['last_name']));
            $email = $db->mysql_prep(trim($_POST['email']));
            $username=$db->mysql_prep(strtolower(trim($_POST['username'])));
            $password=hash("sha256",$db->mysql_prep(trim($_POST['password'])));  
            $phone_number = $db->mysql_prep(trim($_POST['phone_number']));                                         
            // email check is not made yet 
            // also check the email id doesnot exit there... :P
            $admin_table = "admin";
            $query = "Insert into ". $admin_table ." (first_name, last_name, email, phone_number,username,password) ".
                  " values('{$first_name}', '{$last_name}', '{$email}', '{$phone_number}','{$username}','{$password}')";
            $result = $db->query_database($query);
            if(!is_null($result)){
                //set_test_username($email);
                redirect_to("admin_login.php");
            }else{
                 redirect_to("admin_registration.php?message=true");
            }
        }else{
            //echo "empty fields";
        }
    }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Admin Registration</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <script type="text/javascript" src="../js/bootstrap-formhelpers-phone.js"></script>
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
       <script type="text/javascript" src="../js/common.js"></script>
   </head>

   <body>
   <?php include '../includes/header.php'; ?>
   <div class="container" style="font-family: 'Titillium Web', sans-serif;">
        <div class="row centered-form">


        <?php 
          
          if(isset($_GET["message"])){
             echo(show_message(ADMIN_EXISTS));
          } 

         ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 centering ">
         <div class="panel panel-default">
            <div class="panel-heading">
                  <h3 class="panel-title">Please Register here to get Admin Rights</h3>
                  </div>
                  <div class="panel-body">
                  <form role="form" method="post" action="">

                     <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                             <input type="text" name="first_name" id="first_name" value="<?php if(!empty($first_name)) echo $first_name; ?>" required class="form-control input-sm" placeholder="First Name">
                           </div>
                        </div>
                      </div>
                      
                      <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="text" name="last_name" id="last_name" value="<?php if(!empty($last_name)) echo $last_name; ?>"  required class="form-control input-sm" placeholder="Last Name">
                           </div>
                        </div>
                     </div>

                      <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="email" name="email" id="email"  value="<?php if(!empty($email)) echo $email; ?>" required class="form-control input-sm" placeholder=" Your Email  :)">
                           </div>
                        </div>
                     </div>

                     <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="tel" name="phone_number" maxlength="10" id="phone_number"  value="<?php if(!empty($phone_number)) echo $phone_number; ?>" required class="form-control input-sm" placeholder=" Your Mobile number">
                           </div>
                        </div>
                     </div>

                     <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="text" name="username" id="username"  value="<?php if(!empty($username)) echo $username; ?>" required class="form-control input-sm" placeholder="Set Username">
                           </div>
                        </div>
                     </div>

                     <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="password" name="password" id="password"  value="<?php if(!empty($password)) echo $password; ?>" required class="form-control input-sm" placeholder="Set Password">
                           </div>
                        </div>
                     </div>

                     <center>    
                     <input type="submit" name="register" value="Register" class="btn btn-info ">
                     </center>
                  </form>
               </div>
            </div>
         </div>
      </div>
    </div>
    
 </body>