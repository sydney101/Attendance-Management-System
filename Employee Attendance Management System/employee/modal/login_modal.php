<div class="modal fade" id="staffonline" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form class="form-horizontal" action="login.php" method="POST">
			<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
				<h3>Login page</h3>
			</div><!--modal-header-->
			<div class="modal-body">
			<div class="form-group">
				<label for="staffid" class="col-lg-4 control-label" >STAFF ID NUMBER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="staffid" placeholder="enter staff id number">
				</div>
			</div><!--form-group-->
			
			<div class="form-group">
			<label for="level" class="col-lg-4 control-label" >USER LEVEL</label>
				<div class="col-lg-8">
					<select class="form-control">
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
				
			</div><!--modal-body-->
			<div class="modal-footer">
				<button class="btn btn-secondary" type="submit" name="submit">LOGIN</button>
				<a class="btn btn-primary" data-dismiss="modal">CLOSE</a>
			</div><!--modal-footer-->
			</form>
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-starting-->