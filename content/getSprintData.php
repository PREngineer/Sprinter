<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	// Get the Sprint Data
	
	$data = get_SprintData( $_GET['date'] );
	
	echo json_encode($data);

	// You need to provide the date in the URL (via GET)
	
	// Like so: getSprintData.php?date=2018-05-14
	
?>