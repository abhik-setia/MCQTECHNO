<?php
    require_once("includes/db_connect.php");
    require_once("includes/config.php");
    require_once("includes/functions.php"); 
    require_once("includes/session.php"); 

    if(!isset($_SESSION['test_name'])){
        set_error_message(TEST_NAME_NOT_FOUND);
        redirect_to("tests/error.php");
    }

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
                var nVer = navigator.appVersion;
                var nAgt = navigator.userAgent;
                var browserName  = navigator.appName;
                var fullVersion  = ''+parseFloat(navigator.appVersion); 
                var majorVersion = parseInt(navigator.appVersion,10);
                var nameOffset,verOffset,ix;

                // In Opera 15+, the true version is after "OPR/" 
                if ((verOffset=nAgt.indexOf("OPR/"))!=-1) {
                 browserName = "Opera";
                 fullVersion = nAgt.substring(verOffset+4);
                }
                // In older Opera, the true version is after "Opera" or after "Version"
                else if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
                 browserName = "Opera";
                 fullVersion = nAgt.substring(verOffset+6);
                 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
                   fullVersion = nAgt.substring(verOffset+8);
                }
                // In MSIE, the true version is after "MSIE" in userAgent
                else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
                 browserName = "Microsoft Internet Explorer";
                 fullVersion = nAgt.substring(verOffset+5);
                }
                // In Chrome, the true version is after "Chrome" 
                else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
                 browserName = "Chrome";
                 fullVersion = nAgt.substring(verOffset+7);
                }
                // In Safari, the true version is after "Safari" or after "Version" 
                else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
                 browserName = "Safari";
                 fullVersion = nAgt.substring(verOffset+7);
                 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
                   fullVersion = nAgt.substring(verOffset+8);
                }
                // In Firefox, the true version is after "Firefox" 
                else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
                 browserName = "Firefox";
                 fullVersion = nAgt.substring(verOffset+8);
                }
                // In most other browsers, "name/version" is at the end of userAgent 
                else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
                          (verOffset=nAgt.lastIndexOf('/')) ) 
                {
                 browserName = nAgt.substring(nameOffset,verOffset);
                 fullVersion = nAgt.substring(verOffset+1);
                 if (browserName.toLowerCase()==browserName.toUpperCase()) {
                  browserName = navigator.appName;
                 }
                }
                // trim the fullVersion string at semicolon/space if present
                if ((ix=fullVersion.indexOf(";"))!=-1)
                   fullVersion=fullVersion.substring(0,ix);
                if ((ix=fullVersion.indexOf(" "))!=-1)
                   fullVersion=fullVersion.substring(0,ix);

                majorVersion = parseInt(''+fullVersion,10);
                if (isNaN(majorVersion)) {
                 fullVersion  = ''+parseFloat(navigator.appVersion); 
                 majorVersion = parseInt(navigator.appVersion,10);
                }

                /*document.write(''
                 +'Browser name  = '+browserName+'<br>'
                 +'Full version  = '+fullVersion+'<br>'
                 +'Major version = '+majorVersion+'<br>'
                 +'navigator.appName = '+navigator.appName+'<br>'
                 +'navigator.userAgent = '+navigator.userAgent+'<br>'
                )*/


                var number_of_times_to_increment = 1;
                var number_of_times_to_be_checked = 1;
                if(browserName.localeCompare("Firefox")==0) {
                   number_of_times_to_increment = 4;
                   number_of_times_to_be_checked = 4;
                } else if (browserName.localeCompare("Chrome") == 0) {
                   number_of_times_to_increment = 1;
                   number_of_times_to_be_checked = 1;
                }


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
                        if(after_confirm - before_confirm >= 60000){
                            alert("DUDE THATS IT !! ,YOU ARE DONE...");
                            document.getElementById("final_test_form").submit();
                        } 
                        
                        if(after_confirm - before_confirm >= 10000){
                            number_times_warned += number_of_times_to_increment;
                        }
                        number_times_warned += number_of_times_to_increment;                                                
                    }else if(number_times_warned <= number_of_times_to_be_checked){ 
                        var before_confirm = new Date();                       
                        confirm("You are warned earlier if you try to do it again the test will be finished. You are requested not to do it again.");                        
                        var after_confirm = new Date();
                        if(after_confirm - before_confirm >= 5000){
                            number_times_warned += number_of_times_to_increment;
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
    <body style="">      
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
                       <span class="pull-right spaceButton "><input id="submit_test" type="submit" name="btnSubmit" onclick="return confirm('Are you sure? You want to submit Test :) ')" value="Submit" class="btn btn-success"></span>      
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