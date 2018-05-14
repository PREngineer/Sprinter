<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	// Get the Sprint Data
	
	$data = get_SprintData( $_GET['date'] );
	
	echo json_encode($data);
		
?>