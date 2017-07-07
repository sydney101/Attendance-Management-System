<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['level'])){
	$level=$_SESSION['level'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>admin view</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <script src="bootstrap/js/jquery-1.11.2.min.js"></script>  
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">			
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/slidecss.css">
    <script type="text/javaScript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javaScript">
    $(document).ready(function(){
    	$("#showdocuments").click(function(){
    		$("#documents").toggle(1000);
    	});
    });
   function validatestaffid(){
	var staffid =document.search.staffid.value;
	if(staffid==""){
	  	produceprompt("PLEASE ENTER STAFF ID NUMBER","prompt","red");
		return false;
	  }
	  if(/[^0-9a-bA-B\s]/gi.test(staffid)){
		produceprompt("THIS IS INVALID STAFF ID NUMBER ","prompt","red");
		return false;
	}else{
		produceprompt("good","prompt","green");
		return true;
	}
}
function produceprompt(message, promptlocation, color){
	document.getElementById(promptlocation).innerHTML = message;
	document.getElementById(promptlocation).style.color = color;
}


</script>	
</head>
<body>

<div class="container" id="wrapper">
<header class="container">
	<div class="row">		
		<div class="col-md-12 col-lg-12 border">
			<div id="title">
				<h2>Our System</h2>
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
             
        <?php
        if($level=='Administrator'){
        	echo "<li><a href='addstaff.php'>CREAT NEW USER ACCOUNT</a></li>";  
        }

         ?>      
      </ul> 
      <ul class="nav navbar-nav navbar-right">        
        <li><a href="logout.php"> LOGOUT</a></li>
      </ul>    
      <button class="btn btn-primary" onclick="history.go(-1)">BACK</button>  
    </div>
    </nav>   
<div class="container borders">			
				<div class="col-lg-12 "id="searcharea" >
				<form class="form-inline" name="search" method="POST" action="adminview.php">			
					<label class="input-lg">STAFF ID NUMBER</label>					
		   			<input type="text" class="input-lg" value="<?php if(isset($_POST['staffid'])) echo $_POST['staffid'];?>" name="staffid" onkeyup="validatestaffid()" required><label id="prompt"></label>													
					<button class="btn btn-primary btn-md" type="submit" name="search">SEARCH</button>				
				</form>					         
	 			</div><!--search area-->
	   <div class="col-lg-12" id="display">
	   	   <?php
	   	   require 'database/connection.php';
	      if(isset($_POST['search'])){
	       $staffid = $_POST['staffid'];
	       if(!empty($staffid)){
	       	$sql=mysql_query("SELECT * FROM registration WHERE staffid='$staffid'");
	       	if(mysql_num_rows($sql)>0){
	       		while ($row=mysql_fetch_array($sql)){
	       			$firstname= $row['firstname'];
	       			$surname = $row['surname'];
	       			$lastname = $row['lastname'];
	       			$idno = $row['idno'];
	       			$department = $row['department'];
	       			$supervisor = $row['supervisor'];
	       			$dateofbirth = $row['dateofbirth'];
	       			$telephone = $row['telephone'];
	       			$email = $row['email'];
	       			$gender = $row['gender'];

	       		}//while array    

	      ?>	      
	      <table class="table table-stripped" id="filtertable2">
	      <caption>GENERAL INFORMATION</caption>
	      	<tr>
	      		<td><label>FIRST NAME</label></td>
	      		<td><input type="text" readonly value="<?php if(isset($firstname))echo strtoupper($firstname);?>" ></td>
	      		<td><label>SURNAME</label></td>
				<td><input type="text" readonly value="<?php if(isset($surname))echo strtoupper($surname);?>" ></td>
	      	</tr>
	      	<tr>
	      		<td><label>LAST NAME</label></td>
	      		<td><input type="text" readonly value="<?php if(isset($lastname))echo strtoupper($lastname);?>" ></td>
	      		<td><label>DEPARTMENT</label></td>
				<td><input type="text" readonly value="<?php if(isset($department))echo strtoupper($department);?>" ></td>	      		
	      	</tr>
	      	<tr>
	      		<td><label>ID NUMBER</label></td>
	      		<td><input type="text" readonly value="<?php if(isset($idno))echo strtoupper($idno);?>" ></td>
	      		<td><label>SUPERVISOR</label></td>
				<td><input type="text" readonly value="<?php if(isset($supervisor))echo strtoupper($supervisor);?>" ></td>				
	      	</tr>
	      	<tr>
	      		<td><label>TELEPHONE</label></td>
	      		<td><input type="text" readonly value="<?php if(isset($telephone))echo strtoupper($telephone);?>" ></td>
	      		<td><label>DATE OF BIRTH</label></td>
				<td><input type="text" readonly value="<?php if(isset($dateofbirth))echo strtoupper($dateofbirth);?>" ></td>
	      	</tr>
	      	<tr>
	      		<td><label>GENDER</label></td>
	      		<td><input type="text" readonly value="<?php if(isset($gender))echo strtoupper($gender);?>" ></td>
	      		<td><label>EMAIL</label></td>
				<td><input type="text" readonly value="<?php if(isset($email))echo strtoupper($email);?>" ></td>
	      	</tr>
	        	
	      </table>
	      <?php
	       	}else{
	       		echo "<div class='alert alert-warning'>
	 				 <a href='#' class='close' data-dismiss='alert'>&times;</a>
	 				<strong>Error!</strong> THAT STAFF ID NUMBER DOES NOT EXSIST IN OUR DATABASE.
	 				 </div>";	       
	       }
	   }
 }//isset
	      ?>
	     
	   </div><!--display-->
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
</body>
</html>





