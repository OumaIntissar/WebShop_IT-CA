<?php 
	include_once("../../../actions/db_connection.php");
	$category_name = $_POST["lab_name"];
    $category_desc = $_POST["text"];
    $category_state = $_POST["taskOption"];
    $category_id = $_POST["cat_id"];

    if($category_state == "Active"){
		$category_state = 1;
    }elseif ($category_state == "Hidden") {
    	$category_state = 0;
    }
    $sql = "UPDATE category 
    		SET label_cat='$category_name', desc_cat='$category_desc', status='$category_state'
    		WHERE id_cat='$category_id'";
    if ($conn->query($sql)) {
        header("Location: ../category_list.php?success=true"); 
    }else {
    	echo "ERROR";
    }
?>