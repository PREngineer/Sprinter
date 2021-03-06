<?php
	// Include Session Init
	include '../../functions/Init.php';
	// Include DB functions
	include '../../functions/DB.php';
?>

<!-- ******************* NavBar Handler Section ******************* -->
<script>
  $(document).ready(function()
  {
    $("a").click(function()
    {
      var url = $(this).attr("link");
      window.location = url;
    });
  });
</script>

<div class="container">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle (hamburger) get grouped for better mobile display -->
      <div class="navbar-header">
        <!-- Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Brand icon -->
        <a link="index.php" class="navbar-brand" style="cursor: pointer;">
          <img src="../images/TLogo.png" width="30" height="30" alt="Logo">
        </a>
		<a link="index.php" class="navbar-brand" style="cursor: pointer;">Sprinter</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">

		<ul class="nav navbar-nav navbar-right">
			<li id="leaderboardLink">
				<a link="index.php?display=Leaderboard" style="cursor: pointer;">Leaderboard</a>
			</li>
<?php

if( isset($_SESSION['userRole']) && $_SESSION['userRole'] == 1 )
{
	echo'
          <li id="administratorLink">
            <a link="index.php?display=Administrator" style="cursor: pointer;">Administrator</a>
          </li>
		  <li id="deleteAccountLink">
            <a link="index.php?display=DeleteAccount" style="cursor: pointer;">Delete My Account</a>
          </li>
	';
}

if( isset($_SESSION['userRole']) && $_SESSION['userRole'] == 0 )
{
	echo'
          <li id="addDataLink">
            <a link="index.php?display=AddData" style="cursor: pointer;">Add Data</a>
          </li>
		  <li id="deleteAccountLink">
            <a link="index.php?display=DeleteAccount" style="cursor: pointer;">Delete My Account</a>
          </li>
	';
}

if( !isset($_SESSION['userRole']) )
{
	echo' 
		  <li id="loginLink">
            <a link="index.php?display=Login" style="cursor: pointer;">Login</a>
          </li>
	';
}
else
{
	echo '
		<li id="logoutLink">
            <a link="index.php?display=Logout" style="cursor: pointer;">Logout</a>
        </li>
	';
}

?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</div>

<!-- Handle NavBar Highlights -->
<script>
<?php

// Normal user is logged in and adding data
if( $_GET['display'] == 'AddData' && $_SESSION['userRole'] == "0")
{
  echo '
	document.getElementById("addDataLink").classList.add("active");
	document.getElementById("leaderboardLink").classList.remove("active");
	document.getElementById("deleteAccountLink").classList.remove("active");
  ';
}

// Normal user is logged in and viewing leaderboard
if( ($_GET['display'] == 'Leaderboard' || $_GET['display'] == 'SetGoal') && $_SESSION['userRole'] == "0")
{
  echo '
	document.getElementById("addDataLink").classList.remove("active");
	document.getElementById("leaderboardLink").classList.add("active");
	document.getElementById("deleteAccountLink").classList.remove("active");
  ';
}

// Normal user is logged in and viewing delete my account
if( $_GET['display'] == 'DeleteAccount' && $_SESSION['userRole'] == "0")
{
  echo '
	document.getElementById("addDataLink").classList.remove("active");
	document.getElementById("leaderboardLink").classList.remove("active");
	document.getElementById("deleteAccountLink").classList.add("active");
  ';
}

// Unlogged user viewing leaderboard
if( $_GET['display'] == 'Leaderboard' && !isset($_SESSION['userRole']) )
{
  echo '
	document.getElementById("loginLink").classList.remove("active");
	document.getElementById("leaderboardLink").classList.add("active");
	document.getElementById("deleteAccountLink").classList.remove("active");
  ';
}

// If person is logging in
if( $_GET['display'] == 'Login' )
{
  echo '
	document.getElementById("loginLink").classList.add("active");
	document.getElementById("leaderboardLink").classList.remove("active");
	document.getElementById("deleteAccountLink").classList.remove("active");
  ';
}

// Administrator user is logged in and adding data
if( ($_GET['display'] == 'Administrator' || $_GET['display'] == 'CreateSprint' || $_GET['display'] == 'DeleteUser' || 
	 $_GET['display'] == 'EditSprint' || $_GET['display'] == 'EditSprintList' || $_GET['display'] == 'EditUser') && $_SESSION['userRole'] == "1")
{
  echo '
	document.getElementById("administratorLink").classList.add("active");
	document.getElementById("leaderboardLink").classList.remove("active");
	document.getElementById("deleteAccountLink").classList.remove("active");
  ';
}

// Administrator user is logged in and viewing leaderboard
if( $_GET['display'] == 'Leaderboard' && $_SESSION['userRole'] == "1")
{
  echo '
	document.getElementById("administratorLink").classList.remove("active");
	document.getElementById("leaderboardLink").classList.add("active");
	document.getElementById("deleteAccountLink").classList.remove("active");
  ';
}

// Administrator user is logged in and viewing Delete My Account
if( $_GET['display'] == 'DeleteAccount' && $_SESSION['userRole'] == "1")
{
  echo '
	document.getElementById("administratorLink").classList.remove("active");
	document.getElementById("leaderboardLink").classList.remove("active");
	document.getElementById("deleteAccountLink").classList.add("active");
  ';
}

?>
</script>
