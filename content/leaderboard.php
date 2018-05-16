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
						<b>' . $Sprint[2] . '</b>.
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
		$UserGoal = ( get_UserGoal( date("Y-m-d"), $_SESSION['userID'] )[0] )[3];
				
		echo '
				<tr>
					<td>
						Your sprint goal is: 
					</td>
					<td>
						' . $UserGoal . '
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
						<input name="action" type="hidden" value="setGoal">
						<input name="username" type="hidden" value="' . $_SESSION['userID'] . '">
						<input name="sprint" type="hidden" value="' . ( ($Sprint)[0] )[0] . '">
						<input name="goal type="text" class="form-control" maxlength="10" placeholder="' . $UserGoal . '" required>
						<div class="input-group-btn">
							<button type=button class="btn btn-primary">Change Goal</button>
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
			<th style="width:50%">
				Name
			</th>
			<th style="width:25%">
				Count to Date
			</th>
			<th style="width:25%">
				Goal to Date (%)
			</th>
		</thead>


		<tbody>
<?php

	foreach($leaders as $each)
	{
		echo'
				<tr>
					<td>
					' . $each[0] . '
					</td>
					<td>
					' . $each[1] . '
					</td>
					<td>
					' . $each[2] . '
					</td>
				</tr>
		';
	}
?>
		</tbody>
	</table>
</div>