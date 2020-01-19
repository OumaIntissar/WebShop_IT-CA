<?php 
    $msg ="";

    include_once("../../../actions/db_connection.php");
    session_start();
    
    $product_label_cat = $_POST["category"];
    $res_cat =  mysqli_query($conn, "SELECT * FROM category WHERE label_cat='$product_label_cat'");

    if(mysqli_num_rows($res_cat) > 0){
        while($row_cat = mysqli_fetch_array($res_cat)){
                $product_id_cat = $row_cat["id_cat"]; 
        }
    }
    

    $product_label = $conn -> real_escape_string($_POST["label"]);
    $product_price = $_POST["price"];
    $product_weight = $_POST["weight"];
    $product_desc = $conn -> real_escape_string($_POST["description"]);
    $product_image = $_FILES['image']['name'];
    $product_quantity = $_POST["quantity"];

    // the path to store the uploaded image
    $target = "../images/".basename($product_image);

    $duplicat_sql = "SELECT * FROM `product` WHERE label_prod = '$product_label' AND id_cat = '$product_id_cat'"; 
    $duplicat = mysqli_query($conn, $duplicat_sql) or die(mysqli_error($conn));

    if(mysqli_num_rows($duplicat) == 0){

        $sql = "INSERT INTO product (label_prod, id_cat, price_prod, weight_prod, desc_prod, image_prod, quantity_prod)
         VALUES ('$product_label', '$product_id_cat', '$product_price', '$product_weight', '$product_desc', '$product_image', '$product_quantity')";

        //move uploaded image to images folder
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($result) {
            // add activity 
            $label = str_replace(" ","-",$product_label);
            $date = date("Y-m-d h:i:sa");
            $id_adm = $_SESSION['id'];
            $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                            VALUES (1,$id_adm,'$label','$date')";
            if ($conn->query($sql_activity)) {
                echo "thats nice"; 
            }
            header("Location: ../new_product.php?success=true"); 
        }else 'Something went wrong! product has not beel added!';
        
}else header("Location: ../new_product.php?success=false");
?>