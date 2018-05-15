<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php

	$Sprint   = get_SprintData( date("Y-m-d") )[0];
	$UserData = get_UserData( date("Y-m-d"), $_SESSION['userID'] );
	$UserGoal = get_UserGoal( date("Y-m-d"), $_SESSION['userID'] );
	
	//$leaders = get_Leaderboard();
	
	print_r($Sprint);
	echo '<br>';
	print_r($UserData);
	echo '<br>';
	print_r($UserGoal);


echo '<br>';
echo '
	<p>
		The goal this sprint is to ' . $Sprint[2] . '.
	</p>
	<p>
		The rules for the sprint are:
	</p>
	<p>
	' . $Sprint[3] . '
	</p>
';

if( isset($_SESSION['userID']) )
{
	echo '
		<p>
			Your sprint goal is: ' . $UserGoal . '
		</p>
	';
}

?>

<table>
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
echo'
		<tr>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
';
?>
	</tbody>
	</table>
