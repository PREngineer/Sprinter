<title>Sprinter - Delete My Account</title>
<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
	
	protect();
	
?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Delete My Account</h1>

<form class="container" action="api.php">

	<input name="action" type="hidden" value="deleteAccount">
	<input name="do" type="hidden" value="1">
	
	<p><strong class="text-danger"> Are you sure that you want to delete your account?</strong></p>
	
	<p>Deleting your account will also delete all data associated to your account from this platform.</p>

	<div class="form-group">
		<label for="username"> <label class="text-danger">*</label> Username:</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="glyphicon glyphicon-user"></i>
			</span>
			<input name="username" type="text" class="form-control" placeholder="user.name" required>
		</div>
	</div>
	
	<input class="btn btn-default" type="reset"  value="Clear">
	<input class="btn btn-primary" type="submit" value="Delete my account and data">

</form>