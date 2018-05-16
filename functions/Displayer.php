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
  
  // Leaderboard View
  if( $_GET['display'] == 'Leaderboard' )
  {
    echo'
      <script>
        $("#Content").load("leaderboard.php");
      </script>
    ';
  }
 
  // Leaderboard View
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
