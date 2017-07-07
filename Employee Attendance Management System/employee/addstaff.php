<?php
require 'database/connection.php';
if(isset($_POST['addstaff'])){
	$staffid = $_POST['staffid'];
	$level = $_POST['level'];
	$pass1 = $_POST['password1'];
	$pass2 = $_POST['password2'];

	if($staffid===""){
		$staffidempty = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>PLEASE ENTER STAFF ID NUMBER </h3>
	 				 </div>";
	}elseif($level===""){	
	
		$leveempty = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>CHOOSE LEVEL </h3>
	 				 </div>";
	}elseif ($pass1==="") {
		$pass1empty ="<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>ENTER PASSWORD </h3>
	 				 </div>";
	}elseif ($pass2==="") {
		$confirmpassempty="<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>PLEASE CONFIRM PASSWORD </h3>
	 				 </div>";
	}elseif ($pass1!=$pass2) {
		$passmismatch= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>PASSWORD MISMATCH</h3>
	 				 </div>";
	}	
		
	
//check whether the staffid has an account
	$sql=mysql_query("SELECT * FROM user WHERE staffid='$staffid'");	
	if(mysql_num_rows($sql)==0){
		$insertsql=mysql_query("INSERT INTO user SET staffid='$staffid', level='$level', password='$pass1'");
		if($insertsql){
			$newusercreated = "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>success!</strong><h3>YOU HAVE SUCCESSFULLY CREATED A NEW USER </h3>
	 				 </div>";
		}else{
			$problem = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>A PROBLEM HAS OCCURED PLEASE CONTACT IT PROFESSIONAL </h3>
	 				 </div>";
		}

	}else{
		$existuser = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>ALREADY EXISTS </h3>
	 				 </div>";
	}	

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>addstaff</title>
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
		<div class="col-md-6 col-lg-6 border">
			<div id="title">
				<h2>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</h2>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">		
			
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
        <li><a href="adminview.php">VIEW PROFILE</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="logout.php"> LOGOUT</a></li>
      </ul>      
    </div>
    </nav>  
<div class="container2">
<?PHP if(isset($staffidempty))echo $staffidempty;?>
<?php if(isset($leveempty)) echo $leveempty;?>
<?php if(isset($pass1empty))echo $pass1empty;?>
<?php if(isset($passmismatch))echo $passmismatch;?>
<?php if(isset($newusercreated)) echo $newusercreated;?>
<?php if(isset($problem))echo $problem;?>
<?php if(isset($existuser))echo $existuser;?>
			<div class="row">				
				<div class="col-lg-12 " id="form" >				
				<form class="form-horizontal" action="addstaff.php" method="POST" name="register">
				<div class="form-group">
				<label for="staffid" class="col-lg-3 control-label">STAFF ID NUMBER</label>				
				<div class="col-lg-5">
					<input type="text" class="form-control" name="staffid" value="" />
				</div>
				</div><!--form-group-->
				<div class="form-group">
			<label for="password" class="col-lg-3 control-label" >USER LEVEL</label>
				<div class="col-lg-5">
					<select class="form-control" name="level">						
						<option>STAFF</option>
						<option>ADMINISTRATOR</option>
					</select>
				</div>
			</div><!--form-group-->				
			<div class="form-group">
			<label for="password" class="col-lg-3 control-label" >PASSWORD</label>
				<div class="col-lg-5">
					<input type="password" class="form-control" name="password1">
				</div>
			</div><!--form-group-->	
			<div class="form-group">
			<label for="password" class="col-lg-3 control-label" >CONFIRM PASSWORD</label>
				<div class="col-lg-5">
					<input type="password" class="form-control" name="password2">
				</div>
			</div><!--form-group-->									
				
				<div class="form-group">
				<div class="col-lg-5 col-lg-offset-3 ">
					<button class="btn btn-primary form-control" type="submit" name="addstaff">ADD STAFF</button>
				</div>						
				</div><!--form-group-->
				</form>
				</div>	
				       
	      </div><!--close row-->
 
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





