<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="timer.js" type="text/javascript">
</script>
<style>
	.time{
		width:auto;
		height:auto;
		margin:10px 20px 40px 80px;
		font-family:cursive, monospace;
		color:rgb(102,102,102);
		font-size:24px;
	}
</style>

</head>
<body>
	<div class="time">
    <img src="clock.jpg" style="float:left" />
	<div id='timer' />
	<script type="text/javascript">window.onload = CreateTimer("timer", 3000);
    </script>
</div>    
</body>
</html>
