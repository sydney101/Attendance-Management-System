<?php
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>staff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <script src="bootstrap/js/jquery-1.11.2.min.js"></script>  
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">			
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/slidecss.css">
    <script type="text/javaScript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javaScript">

</script>	
</head>
<body>

<div class="container" id="wrapper">
<header class="container">
	<div class="row">		
		<div class="col-md-6 col-lg-8 border">
			<div id="title">
				<h2>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</h2>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">		
			
		</div>
	</div>
</header>
<nav class="navbar navbar-inverse" role="navigation">  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminview.php">VIEW PROFILE</a></li>      
        <li class="active"><a href="register.php">REGISTER NEW STAFF</a></li>     

        <li>
          <a class="dropdown-toggle" data-toggle="dropdown" >ATTENDANCE RECORD <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="time_in.php">TIME_IN</a></li>
            <li><a href="time_out.php">TIME_OUT</a></li>
            
          </ul>
           
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">  
        <li><a href="applyleave.php"> APPLY FOR LEAVE</a></li>       
        <li><a href="logout.php"></span> LOGOUT</a></li>
      </ul>       
    </div>
    </nav>   
<div class="container borders">	
<?php
session_start();
$level= $_SESSION['level'];
$staffid = $_SESSION['staffid'];
$sql=mysql_query("SELECT * FROM registration WHERE staffid='$staffid'");
while($row = mysql_fetch_array($sql)){
$level=$row['level'];
}
echo "<h3>YOU ARE NOW LOGGED IN AS $level</>";
?>				
	   
 </div><!-- content container-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<ul class="nav navbar-nav">
                     <li class=""><a href="history.php">HISTORY</a></li>
                     <li class="active"><a  href="termsandconditions.php">TERMS AND CONDITIONS </a></li>               
                </ul>
			</div><!--col-sm-4 2-->


		</div><!--row-->
		
	</div><!--endcontainer-->
</footer>
</div><!--end wrapper container-->
<!--importing login_modal-->
</body>
</html>





