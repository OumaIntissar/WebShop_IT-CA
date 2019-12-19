<?php 
	include_once("../../../actions/db_connection.php");
	$prd_name = $_POST["prd_label"];
    $prd_price = $_POST["prd_price"];
    $prd_weight = $_POST["prd_quantite"];
    $prd_desc = $_POST["text"];
    $prd_id = $_POST["prod_id"];
    $prd_cat = $_POST["prodCat"];

    $res = mysqli_query($conn, "SELECT * from category WHERE label_cat='$prd_cat'");
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
    }
    $id_cat = $row["id_cat"];

    $sql = "UPDATE product 
    		SET label_prod='$prd_name', desc_prod='$prd_desc', price_prod='$prd_price', weight_prod='$prd_weight', id_cat='$id_cat'
    		WHERE id_prod='$prd_id'";
    if ($conn->query($sql)) {
        header("Location: ../product_list.php?success=true"); 
        // echo $prd_name."-".$prd_price."-".$prd_weight."-".$prd_id."-".$prd_cat."-".$id_cat;
    }else {
    	echo "ERROR";
    }
?>