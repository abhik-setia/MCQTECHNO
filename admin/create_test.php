<?php 

   require_once'../includes/functions.php';
    require_once("../includes/session.php");

    confirm_logged_in();

 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Hello Admin
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
    
      <style type="text/css">
      .spaceX{
         margin-left:18%; 
      }
      a{
         text-decoration: none;
         color:white; 
      }
      a:hover{
         text-decoration: none;
         
      }
      </style>

      <script type="text/javascript">

      </script>
   </head>
   <body >
   <?php include("../includes/header2.php"); ?>
   <center>
      <div class="container" style="font-family: 'Titillium Web', sans-serif;">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 centering">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Hello <?php echo get_username(); ?>, what would you like to do ?</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="">
                         <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering ">
                              <div class="form-group">
                                <a class="btn btn-success col-lg-8 col-xs-8 col-md-8 col-sm-8 centering" id="create_test_button" href="test_details.php">Create Test</a>
                               </div>
                           </div>
                        </div>
                        <br>
                         <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 centering">
                              <div class="form-group">
                                 <a class="btn btn-info col-lg-8 col-xs-8 col-md-8 col-sm-8 centering" id="view_test_button" href="view_test.php">View Test</a>
                              </div>
                           </div>
                        </div>                     
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </center>
   </body>
</html>
