<?php
    include('../../../actions/db_connection.php');
    $fullName = $_POST['fullname'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    if($_POST['status'] == 'Active'){
        $status = '1';
    }else if($_POST['status'] == 'Blocked'){
        $status = '0';
    }
    $sql = "SELECT * FROM `admin` WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($res);
    if($row > 0){
        header('location: ../new_account.php?error=true');
    }else{
        $sql1 = "INSERT INTO admin (`full_name`, `email`, `password`, `role`, `status`, `mobile`) VALUES 
                                                ('$fullName', '$email', '$password', '$role', '$status', '$phone')";
        if (mysqli_query($conn, $sql1)){
            header('location: ../new_account.php?success=true');
        }
    }
?>