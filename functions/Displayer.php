<?php
//echo '<br><br><br><br>Loaded Displayer';

/*
This contains the form submission handlers as well as the get submission handlers.

This is used to determine which element will be loaded into the center of the page.
*/

/*
* Session Handling
*/
{
  // Login View
  if( $_GET['display'] == 'Login')
  {
    echo'
      <script>
        $("#Content").load("login.php");
      </script>
    ';
  }
  
  // Do the actual Login
  if( $_POST['display'] == 'Login')
  {
    echo'
      <script>
        $("#Content").load("login.php?username=' . $_POST['username'] . '&password=' . $_POST['password'] . '");
      </script>
    ';
  }

  // Logout
  if( $_GET['display'] == 'Logout' )
  {
    unset($_SESSION);
	unset($_COOKIE["Sprinter"]);
    session_destroy();

    echo '
      <script>
        window.location = "index.php";
      </script>
    ';
  }
}

/*
* View Handling
*/
{
  // Add Data View
  if( $_GET['display'] == 'AddData' )
  {
    echo'
      <script>
        $("#Content").load("addData.php");
      </script>
    ';
  }
  
  // Administrator View
  if( $_GET['display'] == 'Administrator' )
  {
    echo'
      <script>
        $("#Content").load("administrator.php");
      </script>
    ';
  }
  
  // Create New Sprint
  if( $_GET['display'] == 'CreateSprint' )
  {
    echo'
      <script>
        $("#Content").load("createSprint.php");
      </script>
    ';
  }
  
  // Delete Users
  if( $_GET['display'] == 'DeleteUser' )
  {
    echo'
      <script>
        $("#Content").load("deleteUser.php");
      </script>
    ';
  }
  
  // Delete My Account
  if( $_GET['display'] == 'DeleteAccount' )
  {
    echo'
      <script>
        $("#Content").load("deleteAccount.php");
      </script>
    ';
  }
  
  // Edit Sprint
  if( $_GET['display'] == 'EditSprint' )
  {
    echo'
      <script>
        $("#Content").load("editSprint.php?id=' . $_GET['id'] . '");
      </script>
    ';
  }
  
  // Edit Sprint List
  if( $_GET['display'] == 'EditSprintList' )
  {
    echo'
      <script>
        $("#Content").load("editSprintList.php");
      </script>
    ';
  }
  
  // Edit Sprint
  if( $_GET['display'] == 'EditUser' )
  {
    echo'
      <script>
        $("#Content").load("editUser.php?username=' . $_GET['username'] . '");
      </script>
    ';
  }
  
  // Manage Sprints
  if( $_GET['display'] == 'ManageSprints' )
  {
    echo'
      <script>
        $("#Content").load("manageSprints.php");
      </script>
    ';
  }
  
  // Leaderboard View
  if( $_GET['display'] == 'Leaderboard' )
  {
    echo'
      <script>
        $("#Content").load("leaderboard.php");
      </script>
    ';
  }
 
  // Register View
  if( $_GET['display'] == 'Past' )
  {
    echo'
      <script>
        $("#Content").load("summary.php");
      </script>
    ';
  }
  
  // Register View
  if( $_GET['display'] == 'Register' )
  {
    echo'
      <script>
        $("#Content").load("register.php");
      </script>
    ';
  }

  // Set Goal View
  if( $_GET['display'] == 'SetGoal' )
  {
    echo'
      <script>
        $("#Content").load("setGoal.php");
      </script>
    ';
  }
}



?>
