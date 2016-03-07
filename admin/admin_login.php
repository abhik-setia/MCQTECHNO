<?php 
  require_once'../includes/db_connect.php';
  require_once'../includes/functions.php';

   if(isset($_GET["message"]))
   {
        $message = "Congrats you won 1 million dollars...   just joking, you just logged out. Bye Bye!!";
   }
   if(isset($_GET["message2"]))
   {
        $message="YO! bro...wassup. Sorry but our super admin is watching deadpool, he has not given you rights yet :P";
     }


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
          $password=hash("sha256",$db->mysql_prep($password));
               $db->connect();
               $query = "SELECT username,password,confirm_rights FROM admin where username='{$username}' AND password='{$password}'";
               $user=$db->query_database($query);
               $result=$db->fetch_array($user);
               $admin_rights=$result['confirm_rights'];
               

          if(is_null($result))
          {
                $message = "Incorrect Details,Please Login again..";
                
          }else{
                if($admin_rights==0){
                  redirect_to('admin_login.php?message2=true');
                }else{
                  require_once'../includes/session.php';                  
                  set_username($username);
                  redirect_to('create_test.php');
                 }
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
      <title> Admin Login
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
    
      <style type="text/css">
      .spaceX{
         margin-left:18%; 
      }
      </style>



   </head>
   <body>
   <?php include("../includes/header2.php");

          global $message;
          if(check_var($message)){
            echo(show_message($message));
          } 

          ?>

             <script type="text/javascript">
                var logout_button=document.getElementById('logout_button');
                logout_button.style.visibility='hidden';
             </script>

      <div class="container" style="font-family: 'Titillium Web', sans-serif;">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 centering ">
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
                                 <input type="text" name="username" id="username" value="<?php if(!empty($username)) echo $username; ?>" required class="form-control input-sm" placeholder="Username"/>
                              </div>
                           </div>
                        </div>
                         <div class="row">
                           <label for="password" class=" spaceX"style="float:left">Password</label>    
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                              <div class="form-group">
                                 <input type="password" name="password" required id="password" class="form-control input-sm" placeholder="Password"/>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                          <div>
                           <center>
                          <input type="submit" value="Login" name="submit" class="btn btn-success ">
                           </center>
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
