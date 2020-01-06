<?php 
    include_once("../../../actions/db_connection.php");
    $id_product = $_GET['id'];
    $sql = "UPDATE `product` SET `active`= '0' WHERE id_prod = '$id_product' ";
    if ($conn->query($sql)) {
        // add activity 
        $res = mysqli_query($conn, "SELECT * from product WHERE id_prod='$id_product'");
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
        }
        $prod_name = $row["label_prod"];
        $label = str_replace(" ","-",$prod_name);
        $date = date("Y-m-d h:i:sa");
        $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                        VALUES (3,1,'$label','$date')";
        if ($conn->query($sql_activity)) {
            echo "thats nice"; 
        }
        header("Location: ../product_list.php?success=true"); 
    }
?>