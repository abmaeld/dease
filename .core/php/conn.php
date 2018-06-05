<?php

	/* Server:   */  $s	= "localhost:3306";
	/* Username: */  $u = "root"; 
	/* Password: */  $p = "";
	/* Database: */  $d = "dease";

	$c = new mysqli($s, $u, $p, $d);

	// Display error if fail:

	if ($c->connect_error) {

	    die("Connection failed: " . $c->connect_error); 

	} 

	//echo "Connected successfully";

?>