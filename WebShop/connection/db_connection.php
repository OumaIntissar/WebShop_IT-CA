<?php
	// Create connection"it_ca_db"
	$conn = new mysqli("localhost", "root", "", "mundiaitca_db");
	// Check connection
	if ($conn->connect_error) {
	    header("Location: ../../404.html");
	}

?>  


