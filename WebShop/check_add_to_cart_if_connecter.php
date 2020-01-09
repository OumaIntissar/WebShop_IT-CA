<?php
    include_once("connection/db_connection.php");
	session_start();
	$id_customer = $_SESSION['id_costumer'];
	$connected = "deconnected";
	$id_product = $_GET["id_product"];
	//if(isset($_GET["btn_add_to_cart"])){

		$connected = $_SESSION["connected"];
		if($connected == "connected"){
			// check if ht id product existe in the table cart
			$sql_if_product_already_existe_in_cart = "SELECT * FROM cart WHERE id_product = $id_product AND id_customer=$id_customer";
    		$result = $conn->query($sql_if_product_already_existe_in_cart);
			if($result->num_rows == 0) {
			     // row not found, do stuff...
				//dosn't existe in the table cart
	        	$sql_product = "SELECT * FROM product  WHERE id_prod = $id_product";
	    		$result_product = $conn->query($sql_product);
	    		while($row = $result_product->fetch_assoc()) { 
		        	$id_product = $row["id_prod"];  
		        	$name_product = $row["label_prod"]; 	        	
		        	$image_product = $row["image_prod"];  	        	
		        	$price_product = $row["price_prod"];
	  
		        	//$id_product , $name_product, $image_product, $quantity_product, $price_product
		        	//echo $id_product." ".$name_product." ".$price_product." ".$image_product." ".$quantity_product;
					$sql = "INSERT INTO cart (id_product, name_product, img_product, price_product, id_customer)
					VALUES ('$id_product' , '$name_product', '$image_product', '$price_product','$id_customer')";
					if ($conn->query($sql) === TRUE) {
			    		header('Location: cart.php');
					} 
					else {
		    			echo "Error: " . $sql . "<br>" . $conn->error;
					}
	        	}
			} else {
			// do other stuff...
			echo '<script type="text/javascript">'; 
			echo 'alert("this product exeste already in your cart !!");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';				
			}
		}
        else{
			$message = "you are ".$connected."go to login and connected now";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('Location: sign_in.php');
		}
    //}
    /*else{
      echo "bad you have to click on th button add to cart";
    }*/
?>