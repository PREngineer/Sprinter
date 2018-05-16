<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	if( empty($_GET) )
	{
		echo '
			<h1>API Information</h1>
			
			<h2><u>How to use it:</u></h2>
			
			<p>
				All parameters shall be passed using HTTP GET.
			</p>
			
			<p>
				A sample request is as follows:
				<br><br>
				<pre>api.php?action=getSprintData&date=2018-05-14</pre>
				<br><br>
				The GET parameter <strong>action</strong> determines which action you want the API to execute.  The options are:
				<br><br>
				<strong>1. getSprintData</strong> - Gets a sprint\'s details.
				<br><br>
				<strong>2. getUserData</strong> - Gets the user\'s entered data.
				<br><br>
				<strong>3. getUserGoal</strong> - Gets the user\'s goal for the sprint.
				<br><br>
				<strong>4. setUserGoal</strong> - Sets the user\'s goal for the sprint.
				<br><br>
			</p>
			
			<hr><hr>
			
			<h2><u>Actions:</u></h2>
			
			<p>
				<h3>1. getSprintData</h3>
				<br><br>
				
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>date</i></b> - In the format \'YYYY-mm-dd\'
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i>
				b. <b><i>Name</b></i>
				c. <b><i>Goal</b></i>
				d. <b><i>Rules</b></i>
				e. <b><i>Start Date</b></i>
				f. <b><i>End Date</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>2. getUserData</h3>
				
				<br><br>
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>username</i></b> - The username of the person
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i>
				b. <b><i>User</b></i>
				c. <b><i>SprintID</b></i>
				d. <b><i>Data</b></i>
				e. <b><i>Date</b></i>
				f. <b><i>Recorded</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>3. getUserGoal</h3>
				
				<br><br>
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>username</i></b> - The username of the person
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i>
				b. <b><i>User</b></i>
				c. <b><i>SprintID</b></i>
				d. <b><i>Goal</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>4. setUserGoal</h3>
				
				<br><br>
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>goal</i></b> - In the format \'YYYY-mm-dd\'
				b. <b><i>user</i></b> - In the format \'YYYY-mm-dd\'
				<br><br>
				
				<strong>Returns:</strong>
				<br><br>
				Entry ID, User, Sprint ID, Goal
				<br><br>
				<hr>
				<br><br>
				<strong>Returns:</strong>
				<br><br>
				True or Error
				<br><br>
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