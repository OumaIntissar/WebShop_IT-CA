<?php 
    include_once("../../../actions/db_connection.php");
    $id_product = $_GET['id'];
    $sql = "UPDATE `product` SET `active`= '1' WHERE id_prod = '$id_product' ";
    if ($conn->query($sql)) {
        header("Location: ../product_list.php?success=true"); 
    }
?>