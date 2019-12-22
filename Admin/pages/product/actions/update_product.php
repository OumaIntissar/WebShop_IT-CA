<?php 

$msg ="";

	include_once("../../../actions/db_connection.php");
	$prd_name = $_POST["prd_label"];
    $prd_price = $_POST["prd_price"];
    $prd_weight = $_POST["prd_quantite"];
    $prd_quantity = $_POST["quantity"];
    $prd_desc = $_POST["text"];
    $prd_id = $_POST["prod_id"];
    $prd_cat = $_POST["prodCat"];
    $product_image = $_FILES['image']['name'];
    

    // the path to store the uploaded image
    $target = "../images/".basename($product_image);

    $res = mysqli_query($conn, "SELECT * from category WHERE label_cat='$prd_cat'");
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
    }
    $id_cat = $row["id_cat"];

    $sql = "UPDATE product 
    		SET image_prod='$product_image', label_prod='$prd_name',quantity_prod ='$prd_quantity' ,desc_prod='$prd_desc', price_prod='$prd_price', weight_prod='$prd_weight', id_cat='$id_cat'   /*image_prod=*/
            WHERE id_prod='$prd_id'";
            
            

    //move uploaded image to images folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
     }


    if ($conn->query($sql)) {
        header("Location: ../product_list.php?success=true"); 
        // echo $prd_name."-".$prd_price."-".$prd_weight."-".$prd_id."-".$prd_cat."-".$id_cat;
    }else {
    	echo "ERROR";
    }
?>