<?php
require 'database/connection.php';
if(isset($_POST['time_out'])){
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$lastname = $_POST['lastname'];
	$staffid = $_POST['staffid'];
	$idno = $_POST['idno'];
	$department = $_POST['department'];
	$supervisor = $_POST['supervisor'];
	$time_out = $_POST['time_out'];
	$date = $_POST['date'];

if(isset($firstname) && isset($surname) && isset($lastname) && isset($staffid) && isset($idno) 
	&& isset($department) && isset($supervisor) && isset($time_out) && isset($date)){

if(!empty($firstname)&& !empty($surname) && !empty($lastname) && !empty($staffid) && !empty($idno) 
	&& !empty($department)&& !empty($supervisor) && !empty($time_out) && !empty($date)){

	$insertsql=mysql_query("INSERT INTO time_out (firstname, surname, lastname, staffid, idno, department, supervisor, time_out, date) 
		VALUES('".$firstname."','".$surname."','".$lastname."','".$staffid."','".$idno."','".$department."','".$supervisor."','".$time_out."','".$date."')"); 

	if($insertsql){
		$_SESSION['saved'] = "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>Success!</strong><h3>TIME_OUT FORM REGISTERED SUCCESSFULLY</h3>
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
	 				<strong>Error!</strong> THIS TIME_OUT FORM HAS NOT BEEN REGISTERED.
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
    function validatename(){
	var name =document.register.firstname.value;	
	if(name==""){	
		produceprompt("required","nameprompt","red");
		return false;
	}
	if(!/[^0-9a-bA-B\s]/gi.test(name)){
		produceprompt("invalid ","nameprompt","red");
		return false;
	}else{
		produceprompt("good","nameprompt","green");
		return true;
	}
}
function validatesurname(){
	var username = document.register.surname.value;
	  if(username==""){
	  	produceprompt("required","surnameprompt","red");
		return false;
	  }
	  if(!/[^0-9a-bA-B\s]/gi.test(username)){
		produceprompt("invalid ","surnameprompt","red");
		return false;
	}else{
		produceprompt("good","surnameprompt","green");
		return true;
	}
}
function validatelastname(){
	var lastname = document.register.lastname.value;
	  if(lastname==""){
	  	produceprompt("required","lastnameprompt","red");
		return false;
	  }
	  if(!/[^0-9a-bA-B\s]/gi.test(lastname)){
		produceprompt("invalid ","lastnameprompt","red");
		return false;
	}else{
		produceprompt("good","lastnameprompt","green");
		return true;
	}
}

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
				<h3>TIME_OUT FORM</h3>
				<button class="btn btn-primary" onclick="history.go(-1);">BACK</button>
				<?php if(isset($saved))echo $saved;?>
				<?php if(isset($saveerror))echo $saveerror;?>
				<?php if(isset($exist))echo $exist;?>
				<?php if(isset($passwordmismatch))echo $passwordmismatch;?>
				<?php if(isset($emptyfields)) echo $emptyfields;?>
			</div><!--modal-header-->
			<div class="modal-body">
			<form class="form-horizontal" action="time_out.php" method="POST" name="register">

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF FIRST NAME</label>				
				<div class="col-lg-8">
					<input type="text" class="form-control" name="firstname" value="<?php if(isset($firstname))echo $firstname;?>" placeholder="ENTER STAFF FIRST NAME" onkeyup="validatename()"/><label id="nameprompt"></label>
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF SURNAME</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="surname" value="<?php if(isset($surname))echo $surname;?>" placeholder="ENTER STAFF SURNAME" onkeyup="validatesurname()" /><label id="surnameprompt"></label>
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF LAST NAME</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="lastname" value="<?php if(isset($lastname)) echo $lastname;?>" placeholder="ENTER STAFF LAST NAME" onkeyup="validatelastname()"> <label id="lastnameprompt"></label>
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="staffid" value="<?php if(isset($staffid))echo $staffid;?>" placeholder="ENTER STAFF ID NUMBER">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="idno" value="<?php if(isset($idno))echo $idno;?>" placeholder="ENTER ID NUMBER">
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
				<label for="staffid" class="col-lg-4 control-label" >SUPERVISOR</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="supervisor" value="<?php if(isset($supervisor)) echo $supervisor;?>" placeholder="ENTER SUPERVISOR">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">TIME_OUT</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="time_out" value="<?php if(isset($time_out))echo $time_out;?>" placeholder="ENTER TIME_OUT">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">DATE</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="date" value="<?php if(isset($date))echo $date;?>" placeholder="ENTER DATE">
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