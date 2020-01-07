<?php
    include('../../../actions/db_connection.php');
    session_start();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password' AND status = 1";
    $sql1 = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password' AND status = 0";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($res);
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_num_rows($res1);
    if($row > 0){
        $_SESSION['fullname'] = $row[1];
        $_SESSION['role'] = $row[4];
        header('location: ../../menu/menu.php');
    }elseif ($row1 > 0){
        header('location: ../login.php?error=true');
    } else{
        header('location: ../login.php?error1=true');
    }
?>
