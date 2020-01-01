<?php
    include_once("connection/db_connection.php");

    if(isset($_GET["id"])){
    	$search_word = "";
    	$sql = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0  AND id_cat='{$_GET['id']}'";
    }
    
    else if(isset($_GET["btn_search"])){
    	$search_word = $_GET['search'];
    	$sql = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0 AND label_prod like '%$search_word%'";
    }

    else{  
    	$search_word = "";
    	$sql = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0";
    }

    $result = $conn->query($sql);

    $sql_category 	 = "SELECT * FROM category WHERE status='1'";
    $result_category = $conn->query($sql_category);
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
	<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">

	<style>
		.price-text-color{color:#FFD700; font-size: 25px;}
		.img-responsive {
	    width: 240px; /* You can set the dimensions to whatever you want */
	    height: 180px!important;
		}
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
										<input type="text" name="search" value="<?php echo $search_word ?>" required="required" class="header_search_input" placeholder="Search for products...">
										<button type="submit" name="btn_search" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
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
										<div class="cart_count"><span>10</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="cart.php">Cart</a></div>
										<div class="cart_price">$85</div>
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
									<li><a href="product_list.php?id=<?php echo $id_cat ?>"><?php echo $label_cat ?><i class="fas fa-chevron-right"></i></a></li>								
								<?php } ?>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="sign_in.php">Sign In<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="sign_up.php">Registre<i class="fas fa-chevron-down"></i></a></li>
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

	<!-- Product List START -->
	<div class="reviews">
		<div class="container">
	        <div class="row">
	            <div class="col-md-9">
	                <h3>Product List</h3>
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
	                            while($row = $result->fetch_assoc()) { 
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
		                                	<a href="product.php?id=<?php echo $id_prod ?>" style="margin-right: -100px!important;">
		                                		<img src="<?php echo $row['image_prod'] ?>"  class="img-responsive" alt="image of product">
		                                	</a>
		                                </div>
		                                <div class="col-sm-2 col-ofsset-sm-1 info">
		                                    <div class="separator clear-left btn_cart_detail">
			                                    <a class="btn btn-info btn-lg" href="cart.php?id=<?php echo $id_prod ?>">
			                                    <span class="glyphicon glyphicon-shopping-cart"></span>  Add To Cart  
			                                    </a>
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

<script src="js/jquery-3.3.1.min.js"></script>
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

</body>
</html>
	














