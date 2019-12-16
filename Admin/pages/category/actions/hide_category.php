<?php
include_once("../../actions/db_connection.php");

$id_category = $_POST['id_category'];

$query = "UPDATE `category` SET `satus`= 'HIDDEN' WHERE id_cat = '$id_category' ";
$update = mysql_query($query); 
    
header("Location: ../category_list.php"); 


?>