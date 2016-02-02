<?php 
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
      <link rel="stylesheet" href="../css/bootstrap.min.css" >
      <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
      <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript " src="../js/bootstrap.min.js"></script>
       <link rel="stylesheet" type="text/css" href="../css/test_details.css">
         
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
             <li class="list-group-item"><pre><?php global $content; echo $content; ?></pre></li>                  
             
            </ul>
         </div>

      </div>

              <a class="btn btn-success btn-lg" href="../final_test.php">Start Test</a>
                           
     </div> 
   </body>
</html>
