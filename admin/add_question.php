<?php
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	if(isset($_POST["submit"])){
		$db = new DB_CONNECT();		

		if(check_is_set($_POST)){
			$question = $db->mysql_prep($_POS);			
			
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
      <style type="text/css">
      .spaceX{
         margin-left:3%; 
      }
      </style>
   </head>

   <body>
      <?php include("../includes/header.php"); ?>
      <div class="container">
         <div class="row centered-form">
            <div class="col-xs-12 col-sm-7 col-md-7 col-sm-offset-2 ">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Please Enter Question Details</h3>
                  </div>
                  <div class="panel-body">
                  
                     <form role="form" method="post" action="">

                        <fieldset class="form-group">
                            <label for="Question">Your Question ?</label>
                            <!-- <input type="text" class="form-control" id="Question" placeholder="Enter question">
                            --><textarea class="form-control" id="Question" placeholder="Enter question" rows="10"></textarea>
                        </fieldset>
                        <div class="c-inputs-stacked">
                          <p> Mark the option which is correct.</p>
                          <br>
                          <div class="row">
                                <div class="form-group spaceX">
                                    <input id="option1" name="radio-stacked" type="radio" class="" style="float:left">
                                    <span class="col-lg-10" style="float:left">
                                    <input type="text" name="test_name" id="option1" class="form-control input-sm" placeholder="Option 1"/>
                                    </span>
                                </div>
                          </div>
                          <br>
                          <div class="row">
                                <div class="form-group spaceX">
                                    <input id="option1" name="radio-stacked" type="radio" class="" style="float:left">
                                    <span class="col-lg-10" style="float:left">
                                    <input type="text" name="test_name" id="option1" class="form-control input-sm" placeholder="Option 2"/>
                                    </span>
                                </div>
                          </div>
                          <br>
                          <div class="row">
                                <div class="form-group spaceX">
                                    <input id="option1" name="radio-stacked" type="radio" class="" style="float:left">
                                    <span class="col-lg-10" style="float:left">
                                    <input type="text" name="test_name" id="option1" class="form-control input-sm" placeholder="Option 3"/>
                                    </span>
                                </div>
                          </div>
                          <br>
                          <div class="row">
                                <div class="form-group spaceX">
                                    <input id="option1" name="radio-stacked" type="radio" class="" style="float:left">
                                    <span class="col-lg-10" style="float:left">
                                    <input type="text" name="test_name" id="option1" class="form-control input-sm" placeholder="Option 4"/>
                                    </span>
                                </div>
                          </div>


                          <br>
                        </div>
                        <input type="submit" value="Add Question" class="btn  btn-lg btn-success col-lg-offset-4 col-md-offset-4">
                        
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
