<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">	
	<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<div class="container" id="wrapper">
<header class="container">
	<div class="row">		
		<div class="col-md-12 col-lg-12 border">
			<div id="title">
				<h2>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</h2>
			</div>
		</div>
		
	</div>
</header>

<div class="container" id="navigation" >
<nav class="navbar navbar-inverse">  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a  href="about.php">ABOUT OUR SYSTEM </a></li>         
               
      </ul>
      
    </div>
    </nav> 
  </div>
  <button class="btn btn-primary" onclick="history.go(-1)">BACK</button>
 
<div class="container" id="content">
<div class="row">
	<div class="col-sm-12">
	<h4>About our system</h4>
		<p>This is a system that enables employers to monitor the time their employees come and leave for work each and every day.</p>

		</div>
</div>  
</div><!-- content container-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<ul class="nav navbar-nav">
                     <li class="active"><a href="history.php">HISTORY</a></li>
                     <li class="active"><a  href="termsandconditions.php">TERMS AND CONDITIONS </a></li>               
                </ul>
			</div><!--col-sm-4 2-->
        <div class="sp-wrap sp-inner">

				<div class="cp">

								

				</div>
	
			</div>

		</div><!--row-->
		
	</div><!--endcontainer-->
</footer>
</div><!--end wrapper container-->
<!--importing login_modal-->
<?php
require 'modal/login_modal.php';
?>
</body>
</html>



