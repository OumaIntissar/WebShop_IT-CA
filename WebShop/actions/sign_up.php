<?php 
    include_once("../connection/db_connection.php");
 
    $name = $_POST["fullName"];
    $email = $_POST["email"];
    $phone =  $_POST["phone"];
    $pswd = $_POST["password"];
    $confpswd = $_POST["re-password"];
    
    
    if($pswd == $confpswd){

        $sql = "INSERT INTO costumer (full_name, phone, email, password)
        VALUES ('$name', '$phone', '$email', '$pswd')";

        if ($conn->query($sql)) {
            header("Location: ../sign_in.php"); 
        }

    }else{
        header("Location: ../sign_up.php"); 
       
    }
?>