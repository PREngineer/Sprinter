<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
	
	protectUser();
?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Add Data</h1>

<form class="container" action="api.php">
	
	<p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>

	<div class="form-group">
		<label for="amount"> <label class="text-danger">*</label> Amount:</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="glyphicon glyphicon-lock"></i>
			</span>
			<input name="amount" type="text" class="form-control" placeholder="10.00" required>
		</div>
	</div>
	
	<div class="form-group">
		<label for="date"><label class="text-danger">*</label> When:</label>
		<div class="input-group">
			<span class="input-group-addon">
			<i class="glyphicon glyphicon-calendar"></i>
			</span>
			<input name="date" class="form-control" type="text" id="date"
				placeholder="YYYY-MM-DD" aria-required="true" value="2016-09-07">
		</div>
	</div>

	<script type="text/javascript">
		$('#date').datepicker(
		{
			format: "yyyy-mm-dd",
			toggleActive: true,
			weekStart: 1,
			maxViewMode: 3,
			autoclose: true,
			daysOfWeekHighlighted: "1,2,3,4,5",
			todayHighlight: true
		}).on('changeDate', function (e)
		{
			$(this).focus();
		});
	</script>

</form>