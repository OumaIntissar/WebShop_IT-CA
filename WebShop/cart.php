<!-- include the header-->
<?php include_once "header.php";?>

<!-- Cart -->
<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cart_container">
					<div class="cart_title">Shopping Cart</div>


					<div class="cart_items">
						<ul class="cart_list">
							<?php
	                            // output data of each row
								$total_all_price = 0;
	                            while($row = $result_cart->fetch_assoc()) {  
	                            	$id_product = $row["id_product"];  
	                            	$name_product = $row["name_product"]; 
	                            	$img_product = 	$row["img_product"]; 
	                            	$price_product = $row["price_product"];
	                            	$quantite_product = $row["quantite_product"];
	                            	$total_price_product = $quantite_product*$price_product;
									$total_all_price = $total_all_price+$total_price_product;


	                            ?>
							<li class="cart_item clearfix">
								<div class="cart_item_image"><img src="<?php echo $img_product ?>" alt=""></div>
								<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
									<div class="cart_item_name cart_info_col" style="padding-bottom: 50px;">
										<div class="cart_item_title">Name</div>
										<div class="cart_item_text" style="width: 150px;"><?php size_name_product($name_product) ?></div>
									</div> 										

									<div class="cart_item_name cart_info_col" style="margin-left: -30px">
										<div class="cart_item_title " style="margin-left: 30px">Quantite</div>
										<div class="cart_item_text box">										


										<form method="post" action="cart.php">
										<input type="hidden" value="<?php echo $id_product?>" name="id_product_send"/>
										
										<input id="mySelect"  class="mySelect" name="maintenance_mode"
											value="<?php echo $quantite_product ?>" min="1" max="10" type="number" style="width:30%;margin-top: -6px!important;">

										</input>											
										<?php 
										//selcted option i dropdown

											echo '<script>
											
										     $(document).ready(function(){
												var elements = document.getElementsByClassName("mySelect");
												for (var i = 0, l = elements.length; i < l; i++) {
												    elements[i].selectedIndex =';echo $quantite_product ;echo '
												}
											});
											</script>';
										?>
										<input style="margin-top: -6px;" type="submit" id="update" name="update" value="Update" class="btn btn-default btn-md">
										</form>
										</div>
									</div>
										<div class="cart_item_price cart_info_col"  style="margin-left: -00px">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text"><?php echo $price_product ?></div>
										</div>
									<div class="cart_item_total cart_info_col">
										<div class="cart_item_title">Total</div>
										<div class="cart_item_text"><?php echo $total_price_product ?></div>
									</div>
									<div class="cart_item_total cart_info_col">
										<div class="cart_item_action">Delete Product</div>
										<div class="cart_item_text">
											<a href="delete_product_cart.php?id_product=<?php echo $id_product?>" class="btn btn-default btn-sm">		<i class="glyphicon glyphicon-remove" style="color: #FF1493;"></i>
											</a>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						</ul>
					</div>
					<!-- Order Total -->
					<div class="order_total">  
						<div class="order_total_content text-md-right">
							<div class="order_total_title">Order Total:</div>
							<div class="order_total_amount"><?php echo $total_all_price." DH"?></div>
						</div>
					</div>
					  
					<div class="cart_buttons">
						<a href="#?id_product=<?php echo "Abdelali" ?>" class="btn btn-info btn-lg">
      					<span class="glyphicon glyphicon-shopping-cart"></span> Order
   						 </a>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- des opperations sur le drop down just pour choisir la quantite -->
<?php
    if(isset($_POST['update'])){
    	$id_product_send = $_POST['id_product_send'];
        $value = $_POST['maintenance_mode'];
        $sql_quantite = "UPDATE cart SET quantite_product = '$value' WHERE id_product='$id_product_send' AND id_customer='$id_costumer'";
       	$result_quantite = $conn->query($sql_quantite);
   			echo '<script type="text/javascript">'; 
   			//var quantite = <?php echo $value;; //if(true)alert("you cant paye more then 10 products");';
			echo 'window.location.href = "reload_page_cart.php"';
			echo '</script>';
   }?>


<!-- Include Footer-->
<?php include_once "footer.php";?>
</body>

</html>
