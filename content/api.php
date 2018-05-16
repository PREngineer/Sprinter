<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

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
	
		set_UserGoal($_GET['sprint'],  $_GET['username'], $_GET['goal'] );
	
		header('Location: index.php?display=Leaderboard');

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=setUserGoal&sprint=1&username=user.name
	}
	
	print_r($_GET);
?>