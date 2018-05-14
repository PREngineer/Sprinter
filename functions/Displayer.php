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
  if( $_GET['display'] == 'Login' )
  {
    echo'
      <script>
        $("#Content").load("login.php");
      </script>
    ';
  }

  // Logout
  if( $_GET['display'] == 'Logout' )
  {
    unset($_SESSION);
    session_destroy();

    echo '
      <script>
        window.location = "index.php";
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
  if( $_GET['display'] == 'AddData' )
  {
    echo'
      <script>
        $("#Content").load("addData.php");
      </script>
    ';
  }
  
}



?>