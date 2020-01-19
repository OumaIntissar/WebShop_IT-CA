<?php
    session_start();
    include('../../../actions/db_connection.php');
    $id_admin = $_SESSION['id'];
    $fullName = $_POST['fullname'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $date = date("Y-m-d");
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
        $sql1 = "INSERT INTO admin (`full_name`, `email`, `password`, `role`, `status`, `mobile`, `date_C`) VALUES 
                                                ('$fullName', '$email', '$password', '$role', '$status', '$phone', '$date')";
        if (mysqli_query($conn, $sql1)){
            $label = str_replace(" ","-",$fullName);
            $date = date("Y-m-d h:i:sa");
            $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                            VALUES (7,$id_admin,'$label','$date')";
            if ($conn->query($sql_activity)) {
                header('location: ../new_account.php?success=true');
            }
        }
    }
?>