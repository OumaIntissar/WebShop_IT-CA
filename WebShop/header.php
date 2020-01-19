<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
    include_once("connection/db_connection.php");
	session_start();
	if(isset($_SESSION["connected"])){
		$id_costumer = $_SESSION['id_costumer'];
	    //je sais que j ai fait cette requette deux fois mais ne la supprime pas si tu veux que tout ca marche bien
		$sql_cart 	 = "SELECT * FROM cart WHERE id_customer=$id_costumer";
		$result_cart = $conn->query($sql_cart); 
	}
	//augmenter le nombre de vue de produits column viwed
	if(isset($_GET['id_product'])){
		$id_product = $_GET['id_product'];
		$sql = "UPDATE product SET viwed = viwed + 1 WHERE id_prod = '$id_product'";
	   	$result_sql = $conn->query($sql);
	}
	
    //best selling
    $sql_products_best_selling = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0 limit 5";
    $result_products_best_selling = $conn->query($sql_products_best_selling);

	//products mot viwed 
    $sql_products_most_viwed =  "SELECT * FROM product  WHERE active='1' AND quantity_prod>0 ORDER BY viwed DESC LIMIT 8";
    $result_products_most_viwed = $conn->query($sql_products_most_viwed);

    if(isset($_GET["id_categorie"])){
    	$search_word = "";
    	$sql = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0  AND id_cat='{$_GET['id_categorie']}'";
    }
    
    else if(isset($_GET["btn_search"])){
    	$search_word = $_GET['search'];
    	$sql = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0 AND label_prod like '%$search_word%'";
    }

    else{  
    	$search_word = "";
    	$sql = "SELECT * FROM product  WHERE active='1' AND quantity_prod>0";
    }

    $result_product = $conn->query($sql);

    $sql_category 	 = "SELECT * FROM category WHERE status='1'";
    $result_category = $conn->query($sql_category);

    // the categories of footer
    $sql_category3 	 = "SELECT * FROM category WHERE status='1' limit 5";
    $result_category3 = $conn->query($sql_category3);

    $number_product_in_cart = 0;
	$total_price = 0;

	if(isset($_SESSION["connected"])){
		$id_costumer = $_SESSION['id_costumer'];
	    $sql_cart_2 	 = "SELECT  * FROM cart WHERE id_customer=$id_costumer";
		$result_cart_number_product_total_price = $conn->query($sql_cart_2);

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
	//function return a specific length of name product and if the name passe this length we will add ...
	function size_name_product($name){
		if(strlen($name)<=35){
			echo $name;
		}else{
			$y=substr($name,0,35) . '...';
	 		echo $y;
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
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">	

<style>
	.price-text-color{color:#FFD700; font-size: 25px;}
	.img-responsive {
    width: 240px; /* You can set the dimensions to whatever you want */
    height: 180px!important;
	}
	a:link{
	 	text-decoration: none;
	}
   .box select {
	 	background-color: #C0C0C0;
	  	color: white;
	    padding: 12px;
	    width: 90px;
	    height: 48px;
	    border: none;
	    font-size: 22px;
	    margin-top: -35px;
	   	margin-left: -15px;
	    border-radius: 30px;
	    text-align: center;
	    text-align-last:center; 
	}
	.header_search_input{width: 30% !important;}
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
										<input type="text" id="id_search" name="search" value="<?php echo $search_word ?>" required="required" class="header_search_input" placeholder="Search for products...">
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
										<div class="cart_count"><span><?php echo $number_product_in_cart ?></span></div>
									</div>
									<div class="cart_content">										
										<div class="cart_text"><a id="disabled_cart" style="display:none;" href="cart.php">Cart</a></div>
										<div class="cart_price"><?php echo $total_price." DH" ?></div>
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
										<li>
											<a href="product_list.php?id_categorie=<?php echo $id_cat ?>"><?php echo $label_cat ?>
												<i class="fas fa-chevron-right"></i>
											</a>
										</li>								
									<?php
										} 
									?>
								</ul>
							</div>
							<!-- Main Nav Menu -->
							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown" style="margin-top:-18px;" id="ul_menu_log_out">
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