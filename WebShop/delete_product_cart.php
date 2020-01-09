<?php
    include_once("connection/db_connection.php");
    $id_product = $_GET["id_product"];
	// sql to delete a record
	$sql = "DELETE FROM cart WHERE id_product=$id_product";
	if ($conn->query($sql) === TRUE) {
	echo '<script type="text/javascript">'; 
	echo 'alert("Deleted successfully !!");'; 
	echo 'window.location.href = "cart.php"';
	echo '</script>';
	} else {
	    echo "Error deleting record: " . $conn->error;
	}
?>
