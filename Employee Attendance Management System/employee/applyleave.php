<?php
require 'database/connection.php';
if(isset($_POST['register'])){
	$names = $_POST['names'];
	$staffid = $_POST['staffid'];
	$department = $_POST['department'];
	$reason = $_POST['reason'];
	$period = $_POST['period'];

if(isset($names) && isset($staffid) && isset($department) && isset($reason) && isset($period)){

if(!empty($names)&& !empty($staffid) && !empty($department)&& !empty($reason) && !empty($period)){

	$insertsql=mysql_query("INSERT INTO applyleave (names, staffid, department, reason, period) 
		VALUES('".$names."','".$staffid."','".$department."','".$reason."','".$period."')"); 

	if($insertsql){
		$_SESSION['saved'] = "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>Success!</strong><h3>LEAVE FORM REGISTERED SUCCESSFULLY</h3>
	 				 </div>";	 				 
	 				 header('location:index.php'); 
	}else{
		$saveerror= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>A PROBLEM HAS OCCURED. PLEASE TRY AGAIN... </h3>
	 				 </div>"; 
	}

}else{
	$exist= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> THIS LEAVE FORM HAS NOT BEEN REGISTERED.
	 				 </div>";
}

	
}else{
	$emptyfields ="<div class='alert alert-warning'>
	 				<a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> PLEASE FILL ALL THE REQUIRED FILEDS.
	 				 </div>";
}

}



?>
<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">			
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/slidecss.css">
    <script type="text/javaScript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javaScript">
   

    function validatestaffid(){
	var staffid =document.register.staffid.value;
	if(staffid==""){
	  	produceprompt("PLEASE ENTER STAFF ID NUMBER","staffidprompt","red");
		return false;
	  }
	  if(/[^0-9a-bA-B\s]/gi.test(staffid)){
		produceprompt("INVALID STAFF ID NUMBER ","staffidprompt","red");
		return false;
	}else{
		produceprompt("good","staffidprompt","green");
		return true;
	}
}
 
function produceprompt(message, promptlocation, color){
	document.getElementById(promptlocation).innerHTML = message;
	document.getElementById(promptlocation).style.color = color;
}

</script>
<div class="" id="register">
	<div class="modal-dialog">
		<div class="modal-content">		
			<div class="modal-header">			
				<h3>LEAVE APPLICATION FORM</h3>
				<button class="btn btn-primary" onclick="history.go(-1);">BACK</button>
				<?php if(isset($saved))echo $saved;?>
				<?php if(isset($saveerror))echo $saveerror;?>
				<?php if(isset($exist))echo $exist;?>
				<?php if(isset($passwordmismatch))echo $passwordmismatch;?>
				<?php if(isset($emptyfields)) echo $emptyfields;?>
			</div><!--modal-header-->
			<div class="modal-body">
			<form class="form-horizontal" action="applyleave.php" method="POST" name="register">

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF FULL NAMES</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="names" value="<?php if(isset($names))echo $names;?>" placeholder="ENTER STAFF FULL NAMES">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="staffid" value="<?php if(isset($staffid))echo $staffid;?>" placeholder="ENTER STAFF ID NUMBER">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" id="formlabel" >DEPARTMENT</label>
				<div class="col-lg-8">
					<select class="form-control" name="department" >
						<option selected="selected" value="">Choose your Department</option>
						<option value="audit">AUDIT</option>
						<option value="administration">ADMINISTRATION</option>
						<option value="finance">FINANCE</option>
						<option value="human resource">HUMAN RESOURCE</option>
						<option value="ict">ICT</option>
						<option selected="selected" value="<?php if(isset($department))echo $department;?>"><?php if(isset($department))echo strtoupper($department);?></option>
					</select>
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" >REASON FOR LEAVE</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="reason" value="<?php if(isset($reason)) echo $reason;?>" placeholder="ENTER REASON FOR LEAVE">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label"> FOR WHICH PERIOD</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="period" value="<?php if(isset($period))echo $period;?>" placeholder="ENTER FOR WHICH PERIOD">
				</div>
				</div><!--form-group-->
	
				<div class="form-group">
				<div class="col-sm-4 col-lg-offset-4">
					<button class="btn btn-primary form-control" type="submit" name="register">SAVE</button>
				</div>							
				</div><!--form-group-->
				</form>	
				
			</div><!--modal-body-->
			<div class="modal-footer">				
				<p></p>
			</div><!--modal-footer-->			
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-starting-->