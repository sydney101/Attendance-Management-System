<?php
session_start();
require 'database/connection.php';
if(isset($_GET['staffid'])){
	 $staffid = $_GET['staffid'];
//fetching information belonging to this user
	 $query = mysql_query("SELECT * FROM registration WHERE staffid='$staffid'");
	 $row= mysql_fetch_array($query);
	 $firstname=$row['firstname'];
	 $surname = $row['surname'];
	 $lastname =$row['middlename'];
	 $idno = $row['idno'];
	 $department = $row['department'];
	 $supervisor = $row['supervisor'];
	 $dateofbirth = $row['dateofbirth'];
	 $telephone =$row['telephone'];
	 $email =$row['email'];
	 $gender = $row['gender'];
	
}
?>

<!--updating-->
<?php
if(isset($_POST['update'])){
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
if(isset($firstname)&& isset($surname) && isset($lastname) && isset($lastname)&& isset($idno) && isset($staffid)
	&& isset($department) && isset($supervisor) && isset($dateofbirth) && isset($telephone) && isset($email) && isset($gender)){
echo $gender;
if(!empty($firstname)&& !empty($surname) && !empty($lastname) && !empty($idno) && !empty($staffid)
	&& !empty($department)&& !empty($supervisor) && !empty($dateofbirth) && !empty($telephone) && !empty($email)&& !empty($gender)){

	
	//Inserting to database
	$updatesql=mysql_query("UPDATE registration SET firstname='$firstname', surname='$surname', lastname='$lastname',idno='$idno', department='$department', supervisor='$supervisor',
		telephone='$telephone', email='$email' WHERE staffid='$staffid'");
	if($updatesql){
		$_SESSION['update'] = "<div class='alert alert-success'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>Success!</strong><h3>YOUR INFORMATION HAS BEEN UPDATED</h3>
	 				 </div>";	 				 
	 				 header('location:index.php'); 
	}else{
		$updateerror= "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				  <strong>alert!</strong><h3>A PROBLEM HAS OCCURED </h3>
	 				 </div>"; 
	}

	
}else{
	$emptyfields ="<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> PLEASE FILL ALL THE FILEDS.
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
</script>
<div class="" id="register">
	<div class="modal-dialog">
		<div class="modal-content">		
			<div class="modal-header">			
				<h3>UPDATING MY INFORMATION</h3>
				<button class="btn btn-primary" onclick="history.go(-1);">BACK</button>
				<?php if(isset($update))echo $update;?>
				<?php if(isset($updateerror))echo $updateerror;?>
				<?php if(isset($emptyfields))echo $emptyfields;?>																
			</div><!--modal-header-->
			<div class="modal-body">
			<form class="form-horizontal" action="editmydetails.php" method="POST" name="register">
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">FIRST NAME</label>				
				<div class="col-lg-8">
					<input type="text" class="form-control" name="firstname" value="<?php if(isset($firstname))echo $firstname;?>" placeholder="ENTER FIRST NAME" onkeyup="validatename()"/><label id="nameprompt"></label>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">SURNAME</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="surname" value="<?php if(isset($surname))echo $surname;?>" placeholder="ENTER SURNAME" onkeyup="validatesurname()" /><label id="surnameprompt"></label>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">MIDDLE NAME</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="lastname" value="<?php if(isset($lastname)) echo $lastname;?>" placeholder="ENTER LAST NAME" onkeyup="validatemiddlename()"> <label id="middlenameprompt"></label>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" readonly class="form-control" name="staffid" value="<?php if(isset($staffid))echo $staffid;?>">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="idno" value="<?php if(isset($idno))echo $idno;?>">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" >DEPARTMENT</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="department" value="<?php if(isset($department)) echo $department;?>">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">SUPERVISOR</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="supervisor" value="<?php if(isset($supervisor))echo $supervisor;?>">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">DATE OF BIRTH</label>
				<div class="col-lg-8">
					<input type="date" readonly class="form-control" name="dateofbirth" value="<?php if(isset($dateofbirth))echo $dateofbirth;?>">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">TELEPHONE</label>
				<div class="col-lg-8">
					<input type="text" name="telephone" class="form-control" value="<?php if(isset($telephone)) echo $telephone;?>" placeholder="0707-200-314" onkeyup="validatemobile()"><label id="mobileprompt"></label>
				</div>								
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">EMAIL</label>
				<div class="col-lg-8">
					<input type="email" name="email" class="form-control" value="<?php if(isset($email))echo $email;?>" onkeyup="validate_email()"><label id="emailprompt"></label>
				</div>				
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" id="formlabel" >GENDER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?php if(isset($gender)) echo $gender;?>" name="gender">
				</div>
				</div><!--form-group-->				
							
				<div class="form-group">
				<div class="col-sm-4 col-lg-offset-4">
					<button class="btn btn-primary form-control" type="submit" name="update">UPDATE</button>
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