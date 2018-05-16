<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php

	if( isset($_SESSION['userID']) )
	{
		echo'
			<h2>
				Hi there, ' . $_SESSION['fName'] . '!
			</h2>
		';
	}
	else
	{
		echo'
			<h2>
				Hi there!
			</h2>
		';
	}

	$Sprint   = get_SprintData( date("Y-m-d") )[0];
	
	$leaders = get_Leaderboard( date("Y-m-d") );

	echo '<br>';
	echo '
		<table class="table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width:50%">
						Current sprint is: 
					</td>
					<td style="width:50%">
						<b>' . $Sprint[1] . '</b>
					</td>
				</tr>
				</tr>
					<td>
						The goal this sprint is: 
					</td>
					<td>
						<b>' . $Sprint[2] . '</b>
					</td>
				</tr>
				
				<tr>
					<td>
						The rules for the sprint are:
					</td>
					<td>
						<b>' . $Sprint[3] . '</b>
					</td>
				</tr>
	';

	if( isset($_SESSION['userID']) )
	{
		$UserGoal = get_UserGoal( date("Y-m-d"), $_SESSION['userID'] )[0];
				
		echo '
				<tr>
					<td>
						Your sprint goal is: 
					</td>
					<td>
						' . $UserGoal[3] . '
					</td>
				</tr>
		';
	}

	echo '
			</tbody>
		</table>
	';

	if( isset($_SESSION['userID']) )
	{
	echo '
		<br>

		<form action="api.php">
			<div class="row">
				<div class=col-lg-6>
					<div class="input-group">
						<input name="action" type="hidden" value="setUserGoal">
						<input name="goalID" type="hidden" value="' . $UserGoal[0] . '">
						<input name="goal" type="text" class="form-control" maxlength="10" placeholder="' . $UserGoal[3] . '" required>
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary">Change Goal</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<br><br>
		';
	}

?>

<div class="container">
	<table class="table">
		<thead>
			<th>
				Name
			</th>
			<th>
				Count to Date
			</th>
			<th>
				Goal to Date (%)
			</th>
		</thead>


		<tbody>
<?php

	foreach($leaders as $each)
	{
		echo'
				<tr>
					<td style="width:50%">
					' . $each[0] . '
					</td>
					<td style="width:25%">
					' . $each[1] . '
					</td>
					<td style="width:25%">
					' . $each[2] . '
					</td>
				</tr>
		';
	}
?>
		</tbody>
	</table>
</div>