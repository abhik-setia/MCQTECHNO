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
      a{
         text-decoration: none;
         color:white; 
      }
      a:hover{
         text-decoration: none;
         
      }
      </style>
   </head>
   <body>
   <?php include("../includes/header.php"); ?>
   <center>
      <div class="container">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-sm-offset-2 col-lg-offset-4 col-md-offset-4">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Hello Admin</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="">
                         <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                              <div class="form-group">
                                <a class="btn btn-success col-lg-8 col-xs-8 col-md-8 col-sm-8 col-lg-offset-8 col-md-offset-8 col-sm-offset-8" href="test_details.php">Create Test</a>
                               </div>
                           </div>
                        </div>
                        <br>
                         <div class="row">
                           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                              <div class="form-group">
                                 <a class="btn btn-info col-lg-8 col-xs-8 col-md-8 col-sm-8 col-lg-offset-8 col-md-offset-8 col-sm-offset-8" href="#">View Test</a>
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
