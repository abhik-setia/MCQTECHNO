<?php
    require_once('../includes/session.php');
    
    if(isset($_SESSION["message_test_time_not_correct"])){
        $error_message = $_SESSION["message_test_time_not_correct"];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
</head>
<body>
    <center><h1><?php global $error_message; echo $error_message; ?></h1></center>
</body>
</html>