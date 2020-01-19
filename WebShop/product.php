<!-- include the header-->
<?php include_once "header.php";?>


<!-- Single Product -->
<div class="single_product">
	<div class="container">
		<div class="row">	
			<?php 
				$id_prod = $_GET['id_product'];
				$prod = mysqli_query($conn, "SELECT * from product where id_prod = $id_prod");
				if(mysqli_num_rows($prod) > 0){
				$row_prod = mysqli_fetch_array($prod);
				$id_cat = $row_prod["id_cat"];
				$cat = mysqli_query($conn, "SELECT * from category where id_cat = $id_cat");
				$row_cat = mysqli_fetch_array($cat);
				?>

					

					<!-- Selected Image -->
					<div class="col-lg-5 order-lg-2 order-1">
						<div class="image_selected">
							<img src="<?php echo $row_prod['image_prod'] ?>"  class="img-responsive" alt="image of product">
						</div>
					</div>

					<?php
					echo'
					<!-- Description -->
					<div class="col-lg-5 order-3">
						<div class="product_description">
					<div class="product_category">'.$row_cat["label_cat"].'</div>
					<div class="product_name">'.$row_prod["label_prod"].'</div>
					<div class="product_text"><p>'.$row_prod["desc_prod"].'</p></div>
					<div class="order_info d-flex flex-row">
							<div class="clearfix" style="z-index: 1000;">

								<!-- Product Quantity -->
								<div class="product_quantity clearfix">
									<span>Quantity: </span>
									<input id="quantity_input" type="number" pattern="[0-9]*" value="1">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
									</div>
								</div>

							</div>

							<div class="product_price">
								
								'.$row_prod["price_prod"].' MAD</div> <br><br>
							<div class="button_container">' ?>
								<!-- Tahiri Start -->
								<form method="GET" action="check_add_to_cart_if_connecter.php">
									<input type="hidden" name="id_product" value="<?php echo $id_prod ?>">
									<input type="hidden" name="number_product_in_cart" value="" >										
		                            <button type="submit" name="btn_add_to_cart" value="click" style="border: none;color:white; border-radius: 40px!important;margin-top: 200px;margin-left: -230px;">
			                            <a class="btn btn-info btn-lg"  >
			                                <span class="glyphicon glyphicon-shopping-cart"></span>  Add To Cart  
			                            </a>
			                        </button>
		                        </form>	
		                        <!-- Tahiri End -->
							<?php echo 
							'</div>
					</div>';
				}
					?>							
			</div>
		</div>
	</div>
</div>
<br>
	<!-- Include Footer-->
	<?php include_once "footer.php";?>
</body>
</html>
