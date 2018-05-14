<?php
//echo '<br><br><br><br>Loaded Init';

// Initialize the session
session_start();

/*
  Function that checks if the user SESSION is active
  - Used all over the place
  @Return - Boolean (T or F) if logged in
*/
function logged_in()
{
  return ( isset($_SESSION['userID']) ) ? true : false;
}

/*
  Function that checks if the user Admin session is active
  - Used all over the place
  @Return - Boolean (T or F) if logged in
*/
function protectAdmin()
{
  if( $_SESSION['userRole'] != '3' )
  {
    echo '<script type="text/javascript">
        window.location.href = "/content/index.php?display=Login"
      </script>';
  }
}

// If the session's user_id variable doesn't exist, create it NULL
if(array_key_exists('userID', $_SESSION) === false)
{
	$_SESSION['userID'];
}

// If the session's user_id variable doesn't exist, create it NULL
if(array_key_exists('userRole', $_SESSION) === false)
{
	$_SESSION['userRole'];
}

// Redirect if settings was not found
if( !file_exists('../functions/settings.php') )
{
  echo '<script type="text/javascript">
      window.location.href = "../setup.php"
    </script>
  ';
}



?>
