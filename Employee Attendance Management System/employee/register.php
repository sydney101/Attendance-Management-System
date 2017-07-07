<?php
session_start();
require 'database/connection.php';
if(isset($_POST['register'])){
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$lastname = $_POST['lastname'];
	$staffid = $_POST['staffid'];
	$idno = $_POST['idno'];
	$department = $_POST['department'];
	$supervisor = $_POST['supervisor'];
	$dateofbirth= $_POST['dateofbirth'];
	$telephone=$_POST['telephone'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$level = $_POST['level'];
	$pass=$_POST['pass'];
	$pass1 = $_POST['pass1'];

if(isset($firstname)&& isset($surname) && isset($lastname) && isset($staffid) && isset($idno) 
	&& isset($department) && isset($supervisor) && isset($dateofbirth) && isset($telephone) && isset($email) && isset($gender) && isset($level)){


if(!empty($firstname)&& !empty($surname) && !empty($lastname) && !empty($staffid) && !empty($idno) 
	&& !empty($department)&& !empty($supervisor) && !empty($dateofbirth) && !empty($telephone) && !empty($email)&& !empty($gender)&& !empty($level)&& !empty($pass) && !empty($pass1)){

//check whether password matches 
	if($pass1==$pass){
	//checking whether the staffid is already registered 
	$sql=mysql_query("SELECT staffid FROM registration WHERE staffid='$staffid'");

if(mysql_num_rows($sql)==0){
	//Inserting to database

	
	$insertsql=mysql_query("INSERT INTO registration (firstname, surname, lastname, staffid, idno, department, supervisor, dateofbirth, telephone, email, gender, level, password) VALUES('".$firstname."','".$surname."','".$lastname."','".$staffid."','".$idno."','".$department."','".$supervisor."','".$dateofbirth."','".$telephone."','".$email."','".$gender."','".$level."','".$pass."')"); 
	

	if($insertsql){
		$_SESSION['saved'] = "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>Success!</strong><h3>STAFF REGISTRATION IS SUCCESSFUL. YOU CAN LOG IN NOW...</h3>
	 				 </div>";	 				 
	 				 header('location:index.php'); 
	}else{
		$saveerror= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>A PROBLEM HAS OCCURED DURING REGISTRATION. PLEASE TRY AGAIN... </h3>
	 				 </div>"; 
	 			
	}

}else{
	$exist= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> THAT STAFF IDENTITY NUMBER HAS ALREADY BEEN REGISTERED.
	 				 </div>";
}
}else{
		$passwordmismatch = "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> WRONG PASSWORD.
	 				 </div>";
	}
	
}else{
	$emptyfields ="<div class='alert alert-warning'>
	 				<a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> PLEASE FILL ALL THE REQUIRED FILEDS.
	 				 </div>";
}




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
function validate_email(){
	var email = document.register.email.value;
	
	  if (email=="") {
	  	produceprompt("required","emailprompt","red");
		return false;
     }
     if(email.match(mailformat)){
     	produceprompt("good","emailprompt","green");
		return true;
     } else{
     	produceprompt("invalid mail","emailprompt","red");
		return false;
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
 function validatemobile(){
	var mobile= document.register.telephone.value;
	 
	  if(mobile==""){
	  	produceprompt("required","mobileprompt","red");
		return false;
		}
		if(mobile.match(phoneno)){
			produceprompt("correct","mobileprompt","green");
			return true;
		}else{
			produceprompt("invalid Number","mobileprompt","red");
			return false;
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
				<h3> NEW STAFF REGISTRATION FORM</h3>
				<button class="btn btn-primary" onclick="history.go(-1);">BACK</button>
				<?php if(isset($saved))echo $saved;?>
				<?php if(isset($saveerror))echo $saveerror;?>
				<?php if(isset($exist))echo $exist;?>
				<?php if(isset($passwordmismatch))echo $passwordmismatch;?>
				<?php if(isset($emptyfields)) echo $emptyfields;?>
			</div><!--modal-header-->
			<div class="modal-body">
			<form class="form-horizontal" action="register.php" method="POST" name="register">
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
					<input type="text" class="form-control" name="staffid" value="<?php if(isset($staffid))echo $staffid;?>" placeholder="ENTER STAFF ID NUMBER" onkeyup="validatestaffid()"><label id="staffidprompt"></label>
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">NATIONAL ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="idno" value="<?php if(isset($idno))echo $idno;?>" placeholder="ENTER NATIONAL ID NUMBER">
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
				<label for="staffid" class="col-lg-4 control-label">SUPERVISOR</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="supervisor" value="<?php if(isset($supervisor))echo $supervisor;?>" placeholder="ENTER YOUR SUPERVISOR">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">DATE OF BIRTH</label>
				<div class="col-lg-8">
					<input type="date" class="form-control" name="dateofbirth" value="<?php if(isset($dateofbirth))echo $dateofbirth;?>" placeholder="ENTER DATE OF BIRTH">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">TELEPHONE</label>
				<div class="col-lg-8">
					<input type="text" name="telephone" class="form-control" value="<?php if(isset($telephone)) echo $telephone;?>" placeholder="" onkeyup="validatemobile()"><label id="mobileprompt"></label>
				</div>								
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">EMAIL</label>
				<div class="col-lg-8">
					<input type="email" name="email" class="form-control" value="<?php if(isset($email))echo $email;?>" placeholder="" onkeyup="validate_email()"><label id="emailprompt"></label>
				</div>				
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" id="formlabel" >GENDER</label>
				<div class="col-lg-8">
					<select class="form-control" name="gender" >
						<option selected="selected" value="">Your gender</option>
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
						<option selected="selected" value="<?php if(isset($gender))echo $gender;?>"><?php if(isset($gender))echo strtoupper($gender);?></option>
					</select>
				</div>
				</div><!--form-group-->
				
                <div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" id="formlabel" >LEVEL</label>
				<div class="col-lg-8">
					<select class="form-control" name="level" >
						<option selected="selected" value="">Your user level</option>
						<option value="STAFF">STAFF</option>
						<option value="ADMINISTRATOR">ADMINISTRATOR</option>
						<option selected="selected" value="<?php if(isset($level))echo $level;?>"><?php if(isset($level))echo strtoupper($level);?></option>
					</select>
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">PASSWORD</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="pass" value="<?php if(isset($pass))echo $pass;?>" placeholder="ENTER YOUR PASSWORD">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">RE-TYPE PASSWORD</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="pass1" value="<?php if(isset($pass1))echo $pass1;?>" placeholder="RETYPE PASSWORD">
				</div>
				</div><!--form-group-->

				<div class="form-group">
				<div class="col-sm-4 col-lg-offset-4">
					<button class="btn btn-primary form-control" type="submit" name="register">REGISTER</button>
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