<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	// Get the Sprint Data
	
	$data = get_SprintData( date('Y-m-d') );
	
	echo str_replace( "\r\n", "<br>", json_encode($data) );
		
?>