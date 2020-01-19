<?php
    session_start();
    include_once("../../../actions/db_connection.php");
    $category_name = $_POST["label"];
    $category_description = $_POST["text"];
    $id_admin = $_SESSION['id'];

    $duplicat_sql = "SELECT * FROM `category` WHERE label_cat = '$category_name'"; 
    $duplicat = mysqli_query($conn, $duplicat_sql) or die(mysqli_error($conn));

    if(mysqli_num_rows($duplicat) == 0){
        $sql = "INSERT INTO category (label_cat, desc_cat)
                VALUES ('$category_name', '$category_description')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
        if ($result) {
            // add activity 
            $label = str_replace(" ","-",$category_name);
            $date = date("Y-m-d h:i:sa");
            $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                            VALUES (4,$id_admin,'$label','$date')";
            if ($conn->query($sql_activity)) {
                echo "thats nice"; 
            }
            header("Location: ../new_category.php?success=true"); 
        }
    }else header("Location: ../new_category.php?success=false"); 
?>