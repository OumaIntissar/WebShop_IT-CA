<?php
	session_start();
    include_once("connection/db_connection.php");
    if(isset($_GET["btn_sing_in"])){
	    $username = $_GET['username'];
	    $password = $_GET['password'];

	    $sql_costumers = "SELECT * FROM costumer";
	    $result_costumers = $conn->query($sql_costumers);

		while($row = $result_costumers->fetch_assoc()) { 
		    $id_costumer       = $row["id_cost"];
		    $email_costumer    = $row["email"];      
		    $password_customer = $row["password"];     

		    if($email_costumer == $username && $password_customer == $password){
		    	header('Location: index.php');
		    	// Set session variables
				$_SESSION["id_costumer"] = $id_costumer;
				$_SESSION["connected"] = "connected";
			}
		    else{
		    	$message = "wrong Email or Password";
				echo "<script type='text/javascript'>alert('$message');</script>";
		    }
		}
    }
    else{
    	$username = "";
	    $password = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sing in</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">


</head>

<body>

<div class="super_container" style="height: 100%;">	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-100 p-b-30">
				<form class="login100-form validate-form" method="GET" action="sign_in.php">
					<span class="login100-form-title p-t-20 p-b-45" style="font-size: xx-large;">
						SIGN IN
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?php echo $password ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" name="btn_sing_in" type="submit">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-70">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

				

				</form>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/cart_custom.js"></script>
</body>

</html>
