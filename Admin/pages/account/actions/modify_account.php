<?php
    session_start();
    include('../../../actions/db_connection.php');
    $id_admin = $_SESSION['id'];
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    if($_POST['oldpassword'] != "" && $_POST['password'] != "" && $_POST['repassword'] != "") {
        $oldpassword = md5($_POST['oldpassword']);
        $password = md5($_POST['password']);
        $repassword = md5($_POST['repassword']);
        $sql = "SELECT password FROM admin WHERE password='$oldpassword'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        if($row > 0){
            $sql1 = "UPDATE admin SET full_name='$fullName', email='$email', mobile=$mobile, password='$password' WHERE id_admin='$id_admin'";
            $fullName1 = str_replace(" ","-",$fullName);
            $text = "Modify name or email or mobile or password for ".$fullName1;
            $label = str_replace(" ","-",$text);
            $date = date("Y-m-d h:i:sa");
            $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                                VALUES (8,$id_admin,'$label','$date')";
            if ($conn->query($sql_activity)) {
                if ($conn->query($sql1)) {
                    header("Location: ../modify_account.php?id=$id_admin&t=T");
                }
            }
        }else if ($row == 0){
            header('location:../modify_account.php?id='.$id_admin.'&f1=F1');
        }
    }else{
        $sql = "SELECT full_name, email, mobile FROM admin WHERE full_name='$fullName' AND email='$email' AND mobile='$mobile'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        if($row > 0){
            header('location:../modify_account.php?id='.$id_admin.'&f=F');
        }else if($row == 0){
            $sql1 = "UPDATE admin SET full_name='$fullName', email='$email', mobile=$mobile WHERE id_admin='$id_admin'";
            $fullName1 = str_replace(" ","-",$fullName);
            $text = "Modify name or email or mobile for ".$fullName1;
            $label = str_replace(" ","-",$text);
            $date = date("Y-m-d h:i:sa");
            $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                                VALUES (8,$id_admin,'$label','$date')";
            if ($conn->query($sql_activity)) {
                if ($conn->query($sql1)) {
                    header("Location: ../modify_account.php?id=$id_admin&t=T");
                }
            }
        }
    }
?>