<?php
	$conn_string = "host=localhost port=5432 dbname=pchan user=postgres ";
	$conn = pg_connect($conn_string);
	if (!$conn) 
	{	
	  	echo "Ocurrió un error.\n";
	  	exit;
	}

?>