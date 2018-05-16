<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	if( !isset($_GET) )
	{
		echo '
			<h1>API Information</h1>
			
			<p>
				<strong>How to use:</strong>
			</p>
			
			<p>
				The GET parameter "action" determines which action you want the API to execute.  The options are as follows:
			</p>
			
			<p>
				1. <strong>getSprintData</strong> - Returns the data of the Sprint that belongs to the specified date give.
			</p>
			
			<p>
				<strong>Parameters:</strong>
			</p>
			
			<p>
				a. <strong>date</strong> - The date of one of the days covered by the Sprint, in the following format: YYYY-mm-dd
			</p>
			
			<p>
				<strong>Returns:</strong>
			</p>
			
			<p>
				It returns a json encoded list of the elements that describe the Sprint.
			</p>
			
			<p>
				<strong>Use:</strong>
			</p>
		';
	}
	
	if($_GET['action'] == "getSprintData")
	{
		// Get the Sprint Data
	
		$data = get_SprintData( $_GET['date'] );
	
		echo json_encode($data);

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=getSprintData&date=2018-05-14
	}
	
	if($_GET['action'] == "getUserData")
	{
		// Get the User Data
	
		$data = get_UserData( date('Y-m-d'), $_GET['username'] );
	
		echo json_encode($data);
	
		// You need to provide the username in the URL (via GET)
	
		// Like so: api.php?action=getUserData&username=user.name
	}
	
	if($_GET['action'] == "getUserGoal")
	{
		// Get the User Goal
	
		$data = get_UserGoal(date('Y-m-d'),  $_GET['username'] );
	
		echo json_encode($data);

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=getUserGoal&date=2018-05-14
	}
	
	if($_GET['action'] == "setUserGoal")
	{
		// Get the User Goal
	
		echo set_UserGoal($_GET['goal'], $_GET['user'] );
	
		header('Location: index.php?display=Leaderboard');

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=setUserGoal&user=user.name&goal=100
	}
	
	//print_r($_GET);
?>