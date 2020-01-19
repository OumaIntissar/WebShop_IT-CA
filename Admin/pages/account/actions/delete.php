<?php
    session_start();
    include_once("../../../actions/db_connection.php");
    $id = $_GET['id'];
    $id_admin = $_SESSION['id'];
    $sql = "DELETE FROM `admin` WHERE id_admin = '$id' ";
    // add activity
    $res = mysqli_query($conn, "SELECT * from admin WHERE id_admin='$id'");
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
    }
    $fullname = $row["full_name"];
    $label = str_replace(" ","-",$fullname);
    $date = date("Y-m-d h:i:sa");
    $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                                VALUES (9,$id_admin,'$label','$date')";
    if ($conn->query($sql_activity)) {
        if ($conn->query($sql)) {
            header("Location: ../account_list.php");
        }
    }
?>