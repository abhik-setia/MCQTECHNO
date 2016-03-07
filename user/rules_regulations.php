<?php
    require_once("../includes/config.php");
    require_once("../includes/session.php");   
    if(!isset($_SESSION['test_name'])){
        set_error_message(TEST_NAME_NOT_FOUND);
        redirect_to("../tests/error.php");
    } 
    $file = "../common/common_rules_and_regulations.txt";
    $content = file_get_contents($file);                        
?>
<!DOCTYPE html>
<html>
   <head>
      <title>
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/test_details.css">
      <script type = "text/javascript" >
            history.pushState(null, null, 'rules_regulations.php');
            window.addEventListener('popstate', function(event) {
                history.pushState(null, null, 'rules_regulations.php');
            });
      </script>
         
   </head>
   <body>
   <?php include("../includes/header.php"); ?>

   <div class="container" style="font-family: 'Titillium Web', sans-serif;">
      <div class="panel panel-danger">
         <div class="panel-heading">
          <h1>
            Rules And Regulations
          </h1>
         </div>
         <div class="panel-body">
            <ul class="list-group">
             <li class="list-group-item" ><pre style="font-size:1.3em"><?php global $content; echo $content; ?></pre></li>                               
            </ul>
         </div>

      </div>
      <center>
      <a class="btn btn-success btn-lg btn-block" href="../final_test.php">Start Test</a>
      </center>             
     </div> 
   </body>
</html>
