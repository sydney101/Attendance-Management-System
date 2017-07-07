<?
if(isset($_POST['register'])){
	echo "ok";
}
?>
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
			produceprompt("invalid No","mobileprompt","red");
			return false;
		}
}
function produceprompt(message, promptlocation, color){
	document.getElementById(promptlocation).innerHTML = message;
	document.getElementById(promptlocation).style.color = color;
}

</script>
<div class="modal fade" id="register" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">		
			<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
				<h3>REGISTRATION FORM</h3>
			</div><!--modal-header-->
			<div class="modal-body">
			<form class="form-horizontal" action="" method="POST" name="register">
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">FIRST NAME</label>				
				<div class="col-lg-8">
					<input type="text" class="form-control" name="firstname" value="" placeholder="ENTER FIRST NAME" onkeyup="validatename()"/><label id="nameprompt"></label>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">SURNAME</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="surname" value="" placeholder="ENTER SURNAME" onkeyup="validatesurname()" /><label id="surnameprompt"></label>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">LAST NAME</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="lastname" placeholder="ENTER LAST NAME" onkeyup="validatelastname()"> <label id="lastnameprompt"></label>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">STAFF ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="staffid" placeholder="ENTER STAFF ID NUMBER">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="idno" placeholder="ENTER YOUR ID NUMBER">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" >DEPARTMENT</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="department" placeholder="ENTER YOUR DEPARTMENT">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">SUPERVISOR</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="supervisor" placeholder="ENTER YOUR SUPERVISOR">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">DATE OF BIRTH</label>
				<div class="col-lg-8">
					<input type="date" class="form-control" name="dateofbirth" placeholder="ENTER DATE OF BIRTH">
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">TELEPHONE</label>
				<div class="col-lg-8">
					<input type="text" name="telephone" class="form-control" placeholder="" onkeyup="validatemobile()"><label id="mobileprompt"></label>
				</div>				
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label">EMAIL</label>
				<div class="col-lg-8">
					<input type="email" name="email" class="form-control" placeholder="" onkeyup="validate_email()"><label id="emailprompt"></label>
				</div>				
				</div><!--form-group-->
				<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" id="formlabel" >GENDER</label>
				<div class="col-lg-8">
					<select class="form-control" name="gender" >
						<option value="male">MALE</option>
						<option value="female">FEMALE</option>
					</select>
				</div>
				</div><!--form-group-->
				<div class="form-group">
				<div class="col-sm-4 ">
					<button class="btn btn-primary form-control" type="submit" name="register">REGISTER</button>
				</div>
				<div class="col-sm-4">
					<button class="btn btn-primary form-control">CLEAR</button>
				</div>				
				</div><!--form-group-->
				</form>				
				
			</div><!--modal-body-->
			<div class="modal-footer">
				<button class="btn btn-secondary" type="submit" name="submit">LOGIN</button>
				<a class="btn btn-primary" data-dismiss="modal">CLOSE</a>
			</div><!--modal-footer-->			
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-starting-->