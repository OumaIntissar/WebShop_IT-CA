<?php
    session_start();
    if(isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'A'){
            include "menu_admin.php";
        } else if($_SESSION['role'] == 'M'){
            include "menu_manager.php";
         } else if($_SESSION['role'] == 'S') {
            include "menu_seller.php";
        }
    }else{
        header('location: ../login/login.php');
    }
?>