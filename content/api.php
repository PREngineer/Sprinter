<title>Sprinter - API</title>
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
				<strong>1. addUserData</strong> - Inserts data pertaining to a user\'s progress.
				<br><br>
				<strong>2. getSprintData</strong> - Gets a sprint\'s details.
				<br><br>
				<strong>3. getUserData</strong> - Gets the user\'s entered data.
				<br><br>
				<strong>4. getUserGoal</strong> - Gets the user\'s goal for the sprint.
				<br><br>
				<strong>5. setUserGoal</strong> - Sets the user\'s goal for the sprint.
				<br><br>
			</p>
			
			<hr><hr>
			
			<h2><u>Actions:</u></h2>
			
			<p>
				<h3>1. addUserData</h3>
				<br><br>
				
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>amount</i></b> - In the format \'XX.XX\' or \'XX\'
				b. <b><i>date</i></b> - In the format \'YYYY-mm-dd\'
				c. <b><i>user</i></b> - The username of the person
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i><br>
				b. <b><i>Name</b></i><br>
				c. <b><i>Goal</b></i><br>
				d. <b><i>Rules</b></i><br>
				e. <b><i>Start Date</b></i><br>
				f. <b><i>End Date</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>2. getSprintData</h3>
				<br><br>
				
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>date</i></b> - In the format \'YYYY-mm-dd\'
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i><br>
				b. <b><i>Name</b></i><br>
				c. <b><i>Goal</b></i><br>
				d. <b><i>Rules</b></i><br>
				e. <b><i>Start Date</b></i><br>
				f. <b><i>End Date</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>3. getUserData</h3>
				
				<br><br>
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>username</i></b> - The username of the person
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i><br>
				b. <b><i>User</b></i><br>
				c. <b><i>SprintID</b></i><br>
				d. <b><i>Data</b></i><br>
				e. <b><i>Date</b></i><br>
				f. <b><i>Recorded</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>4. getUserGoal</h3>
				
				<br><br>
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>username</i></b> - The username of the person
				<br><br>
				
				<b>Returns:</b>
				<br><br>
				
				a. <b><i>ID</b></i><br>
				b. <b><i>User</b></i><br>
				c. <b><i>SprintID</b></i><br>
				d. <b><i>Goal</b></i>
				<br><br>
				<hr>
				<br><br>
				
				
				<h3>5. setUserGoal</h3>
				
				<br><br>
				<b>Parameters:</b>
				<br><br>
				
				a. <b><i>goal</i></b> - In the format \'YYYY-mm-dd\'<br>
				b. <b><i>user</i></b> - In the format \'YYYY-mm-dd\'
				<br><br>
				
				<strong>Returns:</strong>
				<br><br>
				True or Error
				<br><br>
			</p>
		';
	}
	
	if($_GET['action'] == "createSprint")
	{
		$success = createSprint( $_GET['name'], $_GET['goal'], $_GET['rules'], $_GET['start'], $_GET['end'], $_GET['code'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Administrator&CreateSprint=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=CreateSprint&CreateSprint=0');
			}
		}
	}
	
	if($_GET['action'] == "addUserData")
	{
		$success = add_UserData($_GET['amount'], $_GET['date'], $_GET['user'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Leaderboard&AddData=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Leaderboard&AddData=0');
			}
		}

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=setUserGoal&user=user.name&goal=100
	}
	
	if($_GET['action'] == "deleteSprint")
	{
		$success = deleteSprint( $_GET['id'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=EditSprintList&DeleteSprint=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=EditSprintList&DeleteSprint=0');
			}
		}
	}

	if($_GET['action'] == "deleteAccount")
	{
		$success = deleteUser( $_GET['username'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Logout&DeleteUser=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Leaderboard&DeleteUser=0');
			}
		}
	}
	
	if($_GET['action'] == "deleteUser")
	{
		$success = deleteUser( $_GET['username'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=DeleteUser&DeleteUser=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=DeleteUser&DeleteUser=0');
			}
		}
	}
	
	if($_GET['action'] == "editSprint")
	{
		$success = editSprint( $_GET['id'], $_GET['name'], $_GET['goal'], $_GET['rules'], $_GET['start'], $_GET['end'], $_GET['code'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=EditSprintList&EditSprint=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=EditSprintList&EditSprint=0');
			}
		}
	}
	
	if($_GET['action'] == "editUser")
	{
		$success = editUser( $_GET['username'], $_GET['password'], $_GET['fName'], $_GET['initials'], $_GET['lName'], $_GET['role'] );
	
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=DeleteUser&EditUser=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=DeleteUser&EditUser=0');
			}
		}
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
	
	if($_GET['action'] == "logIn")
	{
		// Check if login is successful	
		$res = login($_GET['username'], $_GET['password']);

		if( $res['Result'] )
		{
			$userdata = mysqli_fetch_all( $res['Data'] )[0];
			
			// Initialize the session
			session_start();

			$_SESSION['userID']    = $userdata[0];
			$_SESSION['fName']     = $userdata[1];
			$_SESSION['initials']  = $userdata[2];
			$_SESSION['lName']     = $userdata[3];
			$_SESSION['userRole']  = $userdata[4];

			// Extend cookie life time
			// A month in seconds = 30 days * 24 hours * 60 mins * 60 secs
			$cookieLifetime = 30 * 24 * 60 * 60;
			$lifetime = time() + $cookieLifetime;
			
			// Return JSON
			echo '[{"result":"success"},{"sessionName":"Sprinter","sessionID":"' . session_id() . '","lifetime":"' . $lifetime . '"}]';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				setcookie("Sprinter",session_id(),$lifetime);			
				header('Location: index.php?display=Leaderboard&LoggedIn=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Login&Success=0');
			}
		}

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=setUserGoal&user=user.name&goal=100
	}
	
	if($_GET['action'] == "register")
	{
		// Code is valid
		if( checkCode($_GET['code']) == '1' )
		{
			$success = registerUser($_GET['username'], $_GET['password'], $_GET['fName'], $_GET['initials'], $_GET['lName'] );
			
			// Success registering
			if($success == "1")
			{
				// Return JSON
				echo '{"result":"success"}';
				
				// Redirect to the page
				if($_GET['do'] == "1")
				{
					header('Location: index.php?display=Register&success=1');
				}
			}
			// User already exists
			else if( strpos($success, 'Duplicate entry') !== false )
			{
				// Return JSON
				echo '{"result":"user exists"}';
				
				// Redirect to the page
				if($_GET['do'] == "1")
				{
					header('Location: index.php?display=Register&error=1');
				}
			}
			// Errors occurred
			else
			{
				// Return JSON
				echo '{"result":"error(s) occurred: ' . $success . '"}';
				
				// Redirect to the page
				if($_GET['do'] == "1")
				{
					header('Location: index.php?display=Register&error=2');
				}
			}
		}
		// Code is invalid
		else
		{
			// Return JSON
			echo '{"result":"invalid code"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Register&error=0');
			}
		}

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=registerUser&user=user.name&password=password&fName=fName&initials=i&lName=lName
	}
	
	if($_GET['action'] == "setUserGoal")
	{
		// Set the User Goal
		$success = set_UserGoal($_GET['goal'], $_GET['user'] );
		
		if($success)
		{
			echo '{"result":"success"}';
			
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Leaderboard&SetGoal=1');
			}
		}
		else
		{
			echo '{"result":"failure"}';
			// Redirect to the page
			if($_GET['do'] == "1")
			{
				header('Location: index.php?display=Leaderboard&SetGoal=0');
			}
		}

		// You need to provide the date in the URL (via GET)
	
		// Like so: api.php?action=setUserGoal&user=user.name&goal=100
	}
	
	//print_r($_GET);
?>