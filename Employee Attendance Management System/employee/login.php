<?php
session_start();
require 'database/connection.php';
if(isset($_POST['login'])){
	 $staffid=$_POST['staffid'];
	 $level=$_POST['level'];
	 $password=$_POST['password'];
	if($staffid===""):
		$staffiderror = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> PLEASE ENTER STAFF ID NUMBER.
	 				 </div>";
	endif;
	if($level===""):
		$levelerror="<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> PLEASE SELECT YOUR USER LEVEL.
	 				 </div>";
	endif;
	if($password===""):
		$passworderror= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> PLEASE ENTER PASSWORD.
	 				 </div>";
	endif;
	if($level=="Employee"){
		$sql = mysql_query("SELECT * FROM registration WHERE staffid='$staffid' AND password ='$password'");
		if(mysql_num_rows($sql)>0){
			$_SESSION['level']= $level;
			$_SESSION['staffid']= $staffid;

			$Loged = "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong>  YOU HAVE SUCCEFULLY LOGGED IN.
	 				 </div>";
	 				 sleep(1);
			header('LOCATION:login.php');

		}else{
			$wrongcombination = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong>  WRONG LOGIN CREDENTIALS.
	 				 </div>";
		}//end of login 
	}else{
		$sql2 = mysql_query("SELECT * FROM registration WHERE staffid='$staffid' AND password ='$password' AND level='$level'");
		if(mysql_num_rows($sql2)>0){			
			 $_SESSION['level']= $level;
			 if($_SESSION['level']=="ADMINISTRATOR"){
			 	echo "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>Success!</strong><h3>Your have successfully Logged in as $level</h3>
	 				 </div>";	 				 
	 				 header('LOCATION:administrator.php');
			 }else{			 	
			 	 header('LOCATION:staff.php');
			 }

			
		}else{
			$wrongcombination = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong>  WRONG LOG IN CREDENTIALS.
	 				 </div>";
		}
	}
		


}
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">			
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/slidecss.css">
	<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javaScript" src="bootstrap/js/bootstrap.min.js"></script>
<div class="" id="staffonline" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form class="form-horizontal" action="login.php" method="POST">
			<div class="modal-header">			
				<h3>ENTER YOUR USERNAME AND PASSWORD</h3>
				
				<?php if(isset($staffiderror)) echo $staffiderror;?>
				<?php if(isset($levelerror)) echo $levelerror;?>
				<?php if(isset($passworderror)) echo $passworderror;?>
				<?php if(isset($wrongcombination)) echo $wrongcombination;?>
				<?php if(isset($Loged))echo $Loged;?>
			</div><!--modal-header-->
			<div class="modal-body">
			<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" >STAFF ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="staffid" placeholder="enter staff id number">
				</div>
			</div><!--form-group-->
			<div class="form-group">
			<label for="password" class="col-lg-4 control-label" >USER LEVEL</label>
				<div class="col-lg-8">
					<select class="form-control" name="level">
						<option selected="selected" value="">select your user level</option>
						<option>STAFF</option>
						<option>ADMINISTRATOR</option>
					</select>
				</div>
			</div><!--form-group-->	

			<div class="form-group">
			<label for="password" class="col-lg-4 control-label" >PASSWORD</label>
				<div class="col-lg-8">
					<input type="password" class="form-control" name="password">
				</div>
			</div><!--form-group-->				
			<div class="form-group">
			<div class="col-lg-6 col-lg-offset-4">
					<button class="btn btn-primary form-control" type="submit" name="login">LOGIN</button>
			</div>
			</div>
			</div><!--form-group-->		
			</div><!--modal-body-->
			<div class="modal-footer">				
			</div><!--modal-footer-->
			</form>
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-starting-->