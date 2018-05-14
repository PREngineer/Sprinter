<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	// Get the Sprint Data
	
	$data = get_UserData( date('Y-m-d'), $_GET['username'] );
	
	echo json_encode($data);
	
	// You need to provide the username in the URL (via GET)
	
	// Like so: getSprintData.php?username=jorge.l.pabon.cruz
		
?>