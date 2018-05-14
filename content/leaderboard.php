<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php
	echo 'GET: ';
	print_r($_GET);
	
	echo '<br><br>POST: ';
	print_r($_POST);
	
	echo '<br><br>SESSION: ';
	print_r($_SESSION);
?>
<br>
Leaderboard goes here.
