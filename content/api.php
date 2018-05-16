<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	if( empty($_GET) )
	{
		echo '
			<h1>API Information</h1>
			
			<h2>How to use it:</h2>
			
			<p>
				All parameters shall be passed using HTTP GET.
			</p>
			
			<p>
				A sample request is as follows:
				<br><br>
				<pre>api.php?action=getSprintData&date=2018-05-14</pre>
				<br><br>
				The GET parameter <strong>action</strong> determines which action you want the API to execute.  The options are:
				<br>
				<strong>1. getSprintData</strong> - Gets a sprint\'s details. (Returns: ID, Name, Goal, Rules, Start Date, End Date)
				<br>
				<strong>2. getUserData</strong> - Gets the user\'s entered data. (Returns: Entry ID, User, SprintID, Data, Date, Recorded Timestamp)
				<br>
				<strong>3. getUserGoal</strong> - Gets the user\'s goal for the sprint. (Returns: Entry ID, User, Sprint ID, Goal)
				<br>
				<strong>4. setUserGoal</strong> - Sets the user\'s goal for the sprint. (Returns: True or Error)
			</p>
			
			<p>
				
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