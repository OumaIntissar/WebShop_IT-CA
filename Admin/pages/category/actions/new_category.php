<?php 
    include_once("../../../actions/db_connection.php");
    $category_name = $_POST["label"];
    $category_description = $_POST["text"];
    $sql = "INSERT INTO category (label_cat, desc_cat)
            VALUES ('$category_name', '$category_description')";
    if ($conn->query($sql)) {
        header("Location: ../new_category.php?success=true"); 
    }
?>