<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
    session_start();
    include_once("connection/db_connection.php");
    $sql_category    = "SELECT * FROM category WHERE status='1'";
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
<title>Single Product</title>
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
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

	<style type="text/css">
		.product_price{margin-left:-160px; color:#FFD700!important;font-size:25px;}
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
										<div class="cart_price"><?php echo $total_price ?></div>
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
	</div>

	<!-- Recently Viewed -->




<!-- Footer -->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

</html>
