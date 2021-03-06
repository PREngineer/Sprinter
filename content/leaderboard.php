<title>Sprinter - Leaderboard</title>
<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<script>
  $(document).ready(function()
  {
    $("a").click(function()
    {
      var url = $(this).attr("link");
      window.location = url;
    });
  });
</script>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php

	if( isset($_SESSION['userID']) )
	{
		echo'
			<h4>
				Hi there, ' . $_SESSION['fName'] . '!
			</h4>
		';
	}
	else
	{
		echo'
			<h4>
				Hi there!
			</h4>
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

	if( (isset($_SESSION['userID'])) && ($_SESSION['userRole'] == 0) )
	{
		$UserGoal = get_UserGoal( date("Y-m-d"), $_SESSION['userID'] )[0];
				
		echo '
				<tr>
					<td>
						Your sprint goal is: 
					</td>
					<td>
						';
						
						if( empty($UserGoal) )
						{
							echo '<strong class="text-danger">Not set yet</strong>';
						}
						else
						{
							echo $UserGoal[3];
						}
						
		echo '    |    
						<a link="index.php?display=SetGoal" style="cursor: pointer;">Set Goal</a>
					</td>
				</tr>';
		if( empty($UserGoal) )
		{
			echo '
				<tr>
					<td colspan="2" class="text-danger">
						<strong>The first thing that you should do in any sprint is establish your goal.  Otherwise, you won\'t show up in the leaderboard.</strong>
					</td>
				</tr>
			';
		}
	}

	echo '
			</tbody>
		</table>
	';

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
					' . $each[2] . '%
					</td>
				</tr>
		';
	}
?>
		</tbody>
	</table>
</div>