<title>Sprinter - Add Data</title>
<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
	
	protectUser();
	
	$entries = get_UserData(date("Y-m-d"), $_SESSION['userID']);
?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Add Data</h1>

<form class="container" action="api.php">

	<input name="action" type="hidden" value="addUserData">
	<input name="do" type="hidden" value="1">
	<input name="user" type="hidden" value="<?php echo $_SESSION['userID']; ?>">
	
	<p><strong> Note: All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required.</strong></p>
	
	<p>Provide the date and the amount completed.</p>

	<div class="form-group">
		<label for="amount"> <label class="text-danger">*</label> Amount:</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="glyphicon glyphicon-thumbs-up"></i>
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
			<input name="date" class="form-control" type="text" id="date" placeholder="YYYY-MM-DD" required>
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
	
	<input class="btn btn-default" type="reset"  value="Clear">
	<input class="btn btn-primary" type="submit" value="Submit">

</form>

<br>
<hr>
<br>

<table class="table">
	<thead>
			<th>
				Date
			</th>
			<th>
				Amount
			</th>
			<th>
				Recorded on
			</th>
	</thead>
	<tbody>

<?php


	foreach($entries as $each)
	{
		echo'
				<tr>
					<td style="width:50%">
					' . $each[4] . '
					</td>
					<td style="width:25%">
					' . $each[3] . '
					</td>
					<td style="width:25%">
					' . $each[5] . '
					</td>
				</tr>
		';
	}
?>
	</tbody>
</table>