<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
    include_once("connection/db_connection.php");
    session_start();

    $sql_products_best_selling = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0 limit 5";
    $result_products_best_selling = $conn->query($sql_products_best_selling);

    $sql_category 	 = "SELECT * FROM category WHERE status='1'";
    $result_category = $conn->query($sql_category);

    $number_product_in_cart = 0;

	if(isset($_SESSION["connected"])){
		$id_costumer = $_SESSION['id_costumer'];

    $sql_cart_2 	 = "SELECT  * FROM cart WHERE id_customer=$id_costumer";
	$result_cart_number_product_total_price = $conn->query($sql_cart_2);

	$number_product_in_cart = 0;
	$total_price = 0;
    while($row2 = $result_cart_number_product_total_price->fetch_assoc()) { 
		$number_product_in_cart +=1;
		$total_price += $row2["price_product"]*$row2["quantite_product"];
	}

		$connected = $_SESSION["connected"];
		if($connected == "connected"){
			echo
				"<script>
					$(document).ready(function(){
					    $('#log_out_btn').css({'display': 'block'});
					});
					$(document).ready(function(){
				    $('#home').css({'margin-top': '18px'});
					}); 				
					$(document).ready(function(){
					    $('#sign_in').css({'display': 'none'});
					});
					$(document).ready(function(){
					$('#registre').css({'display': 'none'});
					});
					$(document).ready(function(){
					$('#disabled_cart').css({'display': 'block'});
					});					
				</script>

				";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">	





	<style>
		.price-text-color{color:#FFD700; font-size: 25px;}
		.img-responsive {
	    width: 240px; /* You can set the dimensions to whatever you want */
	    height: 180px!important;

	</style>
</head>

<body>

<div class="super_container">	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">
					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="index.php">OneTech</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="product_list.php" method="GET" class="header_search_form clearfix">
										<input type="text" required="required" class="header_search_input" placeholder="Search for products..." name="search" id="id_search">
										<button type="submit" name="btn_search" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt="">
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span><?php echo $number_product_in_cart ?></span></div>
									</div>
									<div class="cart_content">

										<div class="cart_text"><a id="disabled_cart" style="display:none;" href="cart.php">Cart</a></div>
										<div class="cart_price"><?php echo $total_price  ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>



								<ul class="cat_menu">
								<?php
	                            // output data of each row
	                            while($row = $result_category->fetch_assoc()) { 
	                            	$id_cat  = $row["id_cat"];   
	                            	$label_cat = $row["label_cat"];     
	                            ?>
									<li><a href="product_list.php?id_categorie=<?php echo $id_cat ?>"><?php echo $label_cat ?><i class="fas fa-chevron-right"></i></a></li>								
								<?php } ?>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown" style="margin-top: -18px;" id="ul_menu_log_out">
									<li><a href="index.php" id="home">Home
											<i class="fas fa-chevron-down"></i>
										</a>
									</li>
									<li><a href="sign_in.php" id="sign_in">Sign In<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="sign_up.php" id="registre">Registre<i class="fas fa-chevron-down"></i></a></li>
									<li>
										<a href="log_out.php" id="log_out_btn" style="display:none">
											<img src="images/log_out6.png" style="height: 33px;width: 33px;"><i class="fas fa-chevron-down"></i>
										</a>
									</li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

	</header>

	

	<!-- Banner -->
	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->
			<div class="owl-carousel owl-theme banner_2_slider">
				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div> <br><br>
										<div class="col-md-4 center-block">
    										<a href="#" class="btn btn-info btn-lg">
          										<span class="glyphicon glyphicon-shopping-cart"></span>  Add To Cart
       						 				</a>
										</div>
									</div>									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/11.jpg" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div> <br><br>
										<div class="col-md-4 center-block">
    										<a href="#" class="btn btn-info btn-lg">
          										<span class="glyphicon glyphicon-shopping-cart"></span>  Add To Cart
       						 				</a>
										</div>
									</div>									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/11.jpg" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<!-- Banner 3 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div> <br><br>
										<div class="col-md-4 center-block">
    										<a href="#" class="btn btn-info btn-lg">
          										<span class="glyphicon glyphicon-shopping-cart"></span>  Add To Cart
       						 				</a>
										</div>
									</div>									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="images/11.jpg" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->
	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Our Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>	

				<!-- Popular Categories Slider -->
				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"></div>
									<div style="font-size: larger;" class="popular_category_text">Smartphones & Tablets</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"></div>
									<div style="font-size: larger;"  class="popular_category_text">Computers & Laptops</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"></div>
									<div style="font-size: larger;"  class="popular_category_text">Gadgets</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"></div>
									<div style="font-size: larger;"  class="popular_category_text">Video Games & Consoles</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"></div>
									<div style="font-size: larger;"  class="popular_category_text">Accessories</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Product List START -->
	<div class="reviews">
		<div class="container">
	        <div class="row">
	            <div class="col-md-9">
	                <h3>Best Selling</h3>
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
	                            while($row = $result_products_best_selling->fetch_assoc()) { 
	                            	$id_prod = $row["id_prod"];         
	                            ?>
	                        <div class="col-sm-3 text-center">
	                       		
		                            <div class="col-item">
		                                <div class="info">
		                                    <div class="row">
		                                        <div class="price col-md-12">
		                                            <h5><?php echo $row["label_prod"]; ?></h5>
		                                            <h5 class="price-text-color"><?php echo $row["price_prod"] ?>  DH</h5>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="photo">
		                                	<a href="product.php?id_product=<?php echo $id_prod ?>" 
		                                		style="margin-right: -100px!important;">
		                                		<img src="<?php echo $row['image_prod'] ?>"  class="img-responsive" alt="image of product">
		                                	</a>
		                                </div>
		                                <div class="col-sm-2 col-ofsset-sm-1 info">
		                                    <div class="separator clear-left btn_cart_detail">
												<form method="GET" action="check_add_to_cart_if_connecter.php">
													<input type="hidden" name="id_product" value="<?php echo $id_prod ?>">
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


	<!-- Footer Start-->
	<footer class="footer" style="background-color: #F0F0F0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="index.php">OneTech</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>	
			</div>
		</div>
	</footer>
	<!-- End footer -->

	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;
							<script>document.write(new Date().getFullYear());</script> by <a href="https://colorlib.com" target="_blank">IT-CA</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Copyright End -->
</div>




<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="js/jquery.min"></script>
<script src="jquery-ui.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

<script>
$(function(){
	$('#id_search').autocomplete({
		source: "search_suggession.php",
	});
});
</script>	

</body>
</html>
