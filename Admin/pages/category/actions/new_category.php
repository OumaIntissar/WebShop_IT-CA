<?php 
    include_once("../../../actions/db_connection.php");
    session_start();
    $category_name = $_POST["label"];
    $category_description = $_POST["text"];
    $sql = "INSERT INTO category (label_cat, desc_cat)
            VALUES ('$category_name', '$category_description')";
    if ($conn->query($sql)) {
        // add activity 
        $label = str_replace(" ","-",$category_name);
        $date = date("Y-m-d h:i:sa");
        $id_adm = $_SESSION['id'];
        $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                        VALUES (4,$id_adm,'$label','$date')";
        if ($conn->query($sql_activity)) {
            echo "thats nice"; 
        }
        header("Location: ../new_category.php?success=true"); 
    }
?>