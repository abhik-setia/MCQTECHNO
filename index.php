<!DOCTYPE html>
<html>
<head>
	<title>
    Test Name
	</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 
 </head>
 <style type="text/css">
 .progressBar{
 	margin-top:6%;
 	position:relative;  
 }
 .spaceRadio{
 	margin-left:3%; 
 }
 </style>
<body>
<div class="container-fluid">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="brand" href="#">
                    <img src="http://placehold.it/150x50&text=Logo" alt="">
       </a>
      <a class="navbar-brand" href="#">TechSpardha</a>	
    </div>
    <!-- <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div> -->
  </div>


</nav>

<div class="container-fluid progressBar col-lg-9 col-xs-9 col-sm-9 col-md-9">
<div class="progress ">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    40%
  </div>
</div>
</div>
<div class="container-fluid">
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		
		<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Question 1</a>
      </h4>
    </div>

    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">What do you mean by CSS ?</div>
      <div class="radio spaceRadio ">
        <label><input type="radio" name="optradio">cascade style showcase</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio">cascading style sheets</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio" >cast style sheets</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio" >cast style showcase</label>
      </div>
    
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Question 2</a>
      </h4>
    </div>
    
    <div id="collapse2" class="panel-collapse collapse ">
      <div class="panel-body">What do you mean by CSS ?</div>
      <div class="radio spaceRadio ">
        <label><input type="radio" name="optradio">cascade style showcase</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio">cascading style sheets</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio" >cast style sheets</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio" >cast style showcase</label>
      </div>
    
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Question 3</a>
      </h4>
    </div>
    
    <div id="collapse3" class="panel-collapse collapse ">
      <div class="panel-body">What do you mean by CSS ?</div>
      <div class="radio spaceRadio ">
        <label><input type="radio" name="optradio">cascade style showcase</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio">cascading style sheets</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio" >cast style sheets</label>
      </div>
      <div class="radio spaceRadio">
        <label><input type="radio" name="optradio" >cast style showcase</label>
      </div>
    
    </div>
  </div>
</div>
</div>

	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<p>Name: Abhik</p><br>
		<p>Questions<br> <br>Answered : 2<br>
		Unanswered : 1</p><br>
		<p>Timer :<br> 28:10 mins remaining</p>
	</div>

</div>


<div class="container">
<div class="row">
<ul class="pagination col-*-4 ">
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>
</div>
	<span class="pull-right"><button type="button" class="btn btn-success">Submit</button></span>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 </div>
</body>
</html>