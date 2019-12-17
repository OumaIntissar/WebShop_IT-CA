<?php 
    include_once("../../../actions/db_connection.php");
    $id_category = $_GET['id'];
    $sql = "UPDATE `category` SET `status`= '1' WHERE id_cat = '$id_category' ";
    if ($conn->query($sql)) {
        header("Location: ../category_list.php?success=true"); 
    }
?>