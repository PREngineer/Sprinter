<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	// Get the Sprint Data
	
	$data = get_SprintData( date('Y-m-d') );
	
	echo nl2br( json_encode($data) );
		
?>