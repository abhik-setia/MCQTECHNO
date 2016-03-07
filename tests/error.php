<?php
	require_once('../includes/session.php');
	$error_message = get_error_message();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Error Page</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="http://s12.postimg.org/8ta2or48d/Graphic1.png" type="image/x-icon" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" >
		<script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
		<script type="text/javascript " src="../js/bootstrap.min.js"></script>
       	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>      
     	<link rel="stylesheet" type="text/css" href="../css/final_test.css">
     	<script type="text/javascript">
     		history.pushState(null, null, 'error.php');
            window.addEventListener('popstate', function(event) {
                history.pushState(null, null, 'final_test.php');
            });
     	</script>
    	<style type="text/css">
    		body{
    			background:url("../images/errorpage.png");
    			background-repeat: no-repeat;
    			background-size: auto; 
    		}
    	</style>   		
</head>
<body>
<?php include '../includes/header.php'; ?>
	<div class="container">
		<div class="alert alert-danger fade in alert-dismissible pull-right" role="alert" style="margin-right:0% ">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  				<span aria-hidden="true" id="closeButton">&times;</span>
  			</button> 
  				<h1><?php global $error_message; echo $error_message; ?></h1>
		</div>
	</div>

</body>
</html>