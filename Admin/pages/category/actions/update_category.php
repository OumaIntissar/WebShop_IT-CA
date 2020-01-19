<<<<<<< HEAD
<?php
    session_start();
	include_once("../../../actions/db_connection.php");
=======
<?php 
    include_once("../../../actions/db_connection.php");
    session_start();
	$category_name = $_POST["lab_name"];
    $category_desc = $_POST["text"];
    $category_state = $_POST["taskOption"];
    $category_id = $_POST["cat_id"];
    $id_admin = $_SESSION['id'];
    if($category_state == "Active"){
		$category_state = 1;
    }elseif ($category_state == "Hidden") {
    	$category_state = 0;
    }
    $sql = "UPDATE category 
    		SET label_cat='$category_name', desc_cat='$category_desc', status='$category_state'
    		WHERE id_cat='$category_id'";
    if ($conn->query($sql)) {
        // add activity 
        $label = str_replace(" ","-",$category_name);
        $date = date("Y-m-d h:i:sa");
        $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                        VALUES (5,$id_admin,'$label','$date')";
        if ($conn->query($sql_activity)) {
            echo "thats nice"; 
        }
        header("Location: ../category_list.php?success=true"); 
    }else {
    	echo "ERROR";
    }
?>