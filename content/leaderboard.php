<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php

	$Sprint   = get_SprintData( date("Y-m-d") )[0];
	
	$leaders = get_Leaderboard( date("Y-m-d") );

	echo '<br>';
	echo '
	<table class="table">
		<tr>
			<td>
				Current sprint is: 
			</td>
			<td>
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
		$UserGoal = ( get_UserGoal( date("Y-m-d"), $_SESSION['userID'] )[0] );
		
		print_r($UserGoal);
		
		echo '
			<tr>
				<td>
					Your sprint goal is: 
				</td>
				<td>
					<b>' . $UserGoal[3] . '</b>
				</td>
			</tr>
		';
	}

	echo '
	</table>';

?>

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
