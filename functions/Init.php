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
  if( $_SESSION['userRole'] != '1' )
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

// If the session's First Name variable doesn't exist, create it NULL
if(array_key_exists('fName', $_SESSION) === false)
{
	$_SESSION['fName'];
}

// If the session's First Name variable doesn't exist, create it NULL
if(array_key_exists('initials', $_SESSION) === false)
{
	$_SESSION['initials'];
}

// If the session's First Name variable doesn't exist, create it NULL
if(array_key_exists('lName', $_SESSION) === false)
{
	$_SESSION['lName'];
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
