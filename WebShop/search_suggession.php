<?php 	
    include_once("connection/db_connection.php");

	//Get search term
	$searchTerm = $_GET['term'];

	//Get Matched data from skill table
	$query = $conn->query("SELECT * FROM product WHERE label_prod LIKE '%".$searchTerm."%'") ;
	//Generate skill data array

	if($query->num_rows > 0){
		while ($row = $query->fetch_assoc()) {
			$data[] = $row['label_prod'];
		}
	}
	//return results as json encoded array
	echo json_encode($data);