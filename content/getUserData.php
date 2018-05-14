<?php
	
	include '../functions/Init.php';
	include '../functions/DB.php';

	// Get the Sprint Data
	
	$data = get_UserData( date('Y-m-d'), "jorge.l.pabon.cruz" );
	
	echo json_encode($data);
		
?>