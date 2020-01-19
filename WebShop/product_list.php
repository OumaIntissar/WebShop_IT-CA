<!-- include the header-->
<?php include_once "header.php";?>

<!-- Product List START -->
<div class="reviews">
	<div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>List Products</h3>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                	<hr>
                    <div class="row">
                            <?php
                            // output data of each row
                            while($row = $result_product->fetch_assoc()) { 
                            	$id_product    = $row["id_prod"]; 
                            	$name_product  = $row["label_prod"]; 
                            	$price_product = $row["price_prod"]; 
                            	$image_product =  $row['image_prod'];     
                            ?>
                        <div class="col-sm-3 text-center">
                       		
	                            <div class="col-item">
	                                <div class="info">
	                                    <div class="row">
	                                        <div class="price col-md-12">
	                                            <h5><?php size_name_product($name_product) ?></h5>
	                                            <h5 class="price-text-color"><?php echo $price_product ?>  DH</h5>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="photo">
	                                	<a href="product.php?id_product=<?php echo $id_product ?>" 
	                                		style="margin-right: -100px!important;">
	                                		<img src="<?php echo $image_product ?>"  class="img-responsive" alt="image of product">
	                                	</a>
	                                </div>
	                                <div class="col-sm-2 col-ofsset-sm-1 info">
	                                    <div class="separator clear-left btn_cart_detail">
											<form method="GET" action="check_add_to_cart_if_connecter.php">
												<input type="hidden" name="id_product" value="<?php echo $id_product ?>">
												<input type="hidden" name="number_product_in_cart" value="" >
		                                    	<button type="submit" name="btn_add_to_cart" value="click" 
		                                    	 style="border: none;color:white; border-radius: 40px!important;">
			                                    <a class="btn btn-info btn-lg"  
			                                    	>
			                                    <span class="glyphicon glyphicon-shopping-cart"></span>  Add To Cart  
			                                    </a>
			                                    </button>
		                                	</form>		
	                                    </div>
	                                    <div class="clearfix">
	                                    </div>
	                                    <br><hr>
	                                </div>
	                            </div>
	                       
                        </div> 
                       <?php
                       }
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- Product List END -->

	<!-- Include Footer-->
	<?php include_once "footer.php";?>
	
</body>
</html>
