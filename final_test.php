<?php
    require_once("includes/db_connect.php");
    require_once("includes/functions.php"); 
    require_once("includes/session.php"); 

    $questions_array = array();
            
    $test_questions_table = get_test_name()."_questions";
    //$test_questions_table = "abc" ."_questions";
    $query = "SELECT * FROM ". $test_questions_table;

    $result = $db->query_database($query);    
    if($db->number_of_rows($result) >0){        
        $i = 1;        
        while($row = $db->fetch_array($result)){            
            $question = array();            
            $questions_array[$i] = array();
            $question["question"] = $row["question"];
            $question["option1"] = $row["option1"];
            $question["option2"] = $row["option2"];
            $question["option3"] = $row["option3"];
            $question["option4"] = $row["option4"];
            $question["correct_ans"] = $row["correct_ans"];
            $question["marks"] = $row["marks"];
            $question["negative_marks"] = $row["negative_marks"];            
            $questions_array[$i] = $question;
            // very important
            /* 
                The data can be accesed by the user as we are storing it as a cookie so make it encrypted
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            */            
            setcookie(md5("correct_ans".$i), md5($question["correct_ans"]), time() + (86400 * 30), "/");
            setcookie(md5("marks".$i), $question["marks"], time() + (86400 * 30), "/");
            setcookie(md5("negative_marks".$i), $question["negative_marks"], time() + (86400 * 30), "/");            
            $i++;           
        }
        $number_of_questions = $i-1;
        setcookie(md5("number_of_questions"), $i-1, time() + (86400 * 30), "/");    
        $questions_array["number_of_questions"] =  $i-1 ;                         
        $questions_html = make_questions();        
    }       
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Final Test</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/final_test.css">  
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
        <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript " src="js/bootstrap.min.js"></script>        
        <script src="js/common.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/countdown.css">
        <script type = "text/javascript" >
            // to stop going to the previous page                 
            history.pushState(null, null, 'final_test.php');
            window.addEventListener('popstate', function(event) {
                history.pushState(null, null, 'final_test.php');
            });

            $(document).ready(function(){   


                var number_times_warned = 0;
                // To stop opening of the new tab
                window.addEventListener('focus', function(){
                    document.title = 'focused';
                });

                var confirm_box_dismissed = null;                
                var set_time_out = null;
                window.addEventListener('blur', function(){                                                                                
                    if(number_times_warned == 0){ 
                        var before_confirm = new Date();                       
                        confirm("You are not allowed to open a new window while taking the test. Neither you can minimize this application.");                        
                        var after_confirm = new Date();
                        if(after_confirm - before_confirm >= 10000){
                            number_times_warned++;
                        }
                        number_times_warned++;                                                
                    }else if(number_times_warned == 1){ 
                        var before_confirm = new Date();                       
                        confirm("You are warned earlier if you try to do it again the test will be finished. You are requested not to do it again.");                        
                        var after_confirm = new Date();
                        if(after_confirm - before_confirm >= 5000){
                            number_times_warned++;
                        }
                        number_times_warned++;
                    }else{                        
                        confirm("Your test is finished now. You are a cheater.");                    
                        var form = document.getElementById("final_test_form");
                        var elements = form.elements;
                        for (var i = 0, len = elements.length; i < len; ++i) {
                            elements[i].disabled = true;
                        }
                        document.getElementById("submit_test").disabled = false;
                        document.getElementById("final_test_form").submit();
                    }                    
                });                
            });
        </script>
    </head>
    <body>      
        <?php include 'includes/header.php';?>
        <div class="container progressBar col-lg- col-xs-8 col-sm-8 col-md-8">
            <div class="progress ">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%" id="progress_bar">
                  0%
                </div>
            </div>
        </div>

         <form method="post" action="user/thank_you.php" id="final_test_form">
            <div class="container-fluid " style="font-family: 'Titillium Web', sans-serif;">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 scrollit">
                    <div class="panel-group" id="accordion">
                    <?php                                                
                        global $questions_html;
                        echo $questions_html;
                    ?>                                             
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 fixed " style="font-family: 'Titillium Web', sans-serif;">
                    <div class="row ">
                        <div class="well well-sm">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b>Welcome!! <?php echo get_test_username();?></b>
                                </div>
                                <div class="panel-body">
                                    <p>Questions Answered : <ans id="answered_questions" >0</ans></p>
                                    <p>Questions Unanswered : <unans id="unanswered_questions">
                                    <?php global $questions_array; echo $questions_array["number_of_questions"]; ?></p>                                     
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <ul class="pagination col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <?php 
                            global $number_of_questions;
                            for ($i=1; $i<=$number_of_questions; $i++) {           
                            echo "
                               <li id=\"pagination_id_{$i}\"><a href=\"#collapse{$i}\" data-toggle=\"collapse\" onclick=\"active_pagination({$i})\">{$i}</a></li>
                               " ;
                            } 
                        ?>
                        </ul> 
                    </div>

                    <div class="container-fluid centered">
                        <div id="clock">                        
                          <script type="text/javascript">
                            var deadline = new Date(Date.parse(new Date()) + <?php echo get_test_duration(); ?>*1000);
                          </script>
                          <div id="clockdiv" style="font-family: 'Titillium Web', sans-serif;">
                            
                            <div>
                              <span class="hours"></span>
                              <div class="smalltext">Hours</div>
                            </div>
                            <div>
                              <span class="minutes"></span>
                              <div class="smalltext">Minutes</div>
                            </div>
                            <div>
                              <span class="seconds"></span>
                              <div class="smalltext">Seconds</div>
                            </div>
                          </div>

                        </div>
                       <span class="pull-right spaceButton "><input id="submit_test" type="submit" name="btnSubmit" value="Submit" class="btn btn-success"></span>      
                    </div>                                  
               </div>
            </div>          
         </form>
        <script type="text/javascript" src="js/countdown.js"></script>
        <script type="text/javascript">
            var test_name_header=document.getElementById('test_name_header');
            test_name_header.innerHTML="<?php echo get_test_name(); ?>";

        </script>            
   </body>
</html>