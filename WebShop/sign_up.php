<!DOCTYPE html>
<html lang="en">
<head>
<title>Sing up</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- STYLE SING_UP CSS -->
<link rel="stylesheet" href="css/style_sing_up.css">

    <style type="text/css">
        a:link{
             text-decoration: none;
        }
        input {
            height: 50px;
            width: 100%;
            border: 2px solid white;
            border-radius: 4px;
            font-size:20px;
        }

        input[type=text]:focus {
            border: 3px solid#accffe;
        }
        input[type=password]:focus {
            border: 3px solid#accffe;
        }
    </style>
</head>

<body>

<div class="super_container">
        <div class="wrapper">
            <div class="inner">
                <!-- <img src="images/image-1.png" alt="" class="image-1"> -->
                <form action="" class="form2" style="margin-left: -100px; width: 150%;">
                    <h3>Register</h3>
                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input type="text" class="" placeholder="Full Name...">
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input type="text" class="" placeholder="Phone number...">
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-envelope"></span>
                        <input type="text" class="" placeholder="E-mail...">
                    </div>                    
                    <div class="form-holder">
                        <span class="lnr lnr-phone-handset"></span>
                        <input type="text" class="" placeholder="Address...">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-lock"></span>
                        <input type="password" class="" placeholder="Password...">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-lock"></span>
                        <input type="password" class="" placeholder="Re Password...">
                    </div>

                    <button class="btn btn-info btn-md" style="margin-top: 70px;">
                        <span>Register</span>
                    </button>
                </form>
                <!-- <img src="images/image-2.png" alt="" class="image-2"> -->
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
