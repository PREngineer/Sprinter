<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php

	$Sprint   = get_SprintData( date("Y-m-d") );
	$UserData = get_UserData( date("Y-m-d"), $_SESSION['username'] );
	$UserGoal = get_UserGoal( date("Y-m-d"), $_SESSION['username'] )[3];
	
	print_r($Sprint);
	print_r($UserData);
	print_r($UserGoal);

?>

<br>
Leaderboard goes here.


