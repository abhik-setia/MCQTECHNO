  <?php 
    require_once'../includes/db_connect.php';
    require_once'../includes/config.php';
    require_once'../includes/functions.php';
    require_once'../includes/session.php';

    if(!isset($_SESSION['test_name'])){
        set_error_message(TEST_NAME_NOT_FOUND);
        redirect_to("../tests/error.php");
    }

    if(isset($_POST["register"])){
        if(check_empty($_POST)){
            $first_name = $db->mysql_prep(trim($_POST['first_name']));
            $last_name = $db->mysql_prep(trim($_POST['last_name']));
            $email = $db->mysql_prep(trim($_POST['email']));
            // email check is not made yet 
            // also check the email id doesnot exit there... :P
            $phone_number = $db->mysql_prep(trim($_POST['phone_number']));                                         
            $user_test_table = get_test_name()."_users";
            $query = "Insert into ". $user_test_table ." (first_name, last_name, email, phone_number) ".
                  " values('{$first_name}', '{$last_name}', '{$email}', '{$phone_number}')";
            $result = $db->query_database($query);
            if(!is_null($result)){
                set_test_username($email);
                redirect_to("rules_regulations.php");
            }else{
                 redirect_to("user_registration.php?message=true");
            }
        }else{
            //echo "empty fields";
        }
    }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>User Registration</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
             echo(show_message(USER_EXISTS));
          } 

         ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 centering ">
         <div class="panel panel-default">
            <div class="panel-heading">
                  <h3 class="panel-title">Please Register here to proceed further</h3>
                  </div>
                  <div class="panel-body">
                  <form role="form" method="post" action="">

                     <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                             <input type="text" name="first_name" id="first_name" required class="form-control input-sm" placeholder="First Name">
                           </div>
                        </div>
                      </div>
                      
                      <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="text" name="last_name" id="last_name" required class="form-control input-sm" placeholder="Last Name">
                           </div>
                        </div>
                     </div>

                      <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <input type="email" name="email" id="email" required class="form-control input-sm" placeholder=" Your Email  :)">
                           </div>
                        </div>
                     </div>

                       <div class="row">  
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                           <div class="form-group">
                              <abbr title="Input should contain atleast 10 characters"><input type="text" name="phone_number" maxlength="10" id="phone_number" required class="form-control input-sm" placeholder=" Your Mobile number 10 digits minimun">
                           </div></abbr>
                        </div>
                     </div>
                     <center>    
                     <input type="submit" type="tel" name="register" value="Register" class="btn btn-info ">
                     </center>
                  </form>
               </div>
            </div>
         </div>
      </div>
    </div>
    
 </body>