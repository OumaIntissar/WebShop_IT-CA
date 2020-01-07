<?php
    include_once("../../../actions/db_connection.php");
    $id = $_GET['id'];
    $id_admin = $_GET['id_admin'];
    $sql = "UPDATE `admin` SET `status`= '0' WHERE id_admin = '$id' ";
    if ($conn->query($sql)) {
        // add activity
        $res = mysqli_query($conn, "SELECT * from admin WHERE id_admin='$id'");
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
        }
        $fullname = $row["full_name"];
        $label = str_replace(" ","-",$fullname);
        $date = date("Y-m-d h:i:sa");
        $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                            VALUES (14,$id_admin,'$label','$date')";
        if ($conn->query($sql_activity)) {
            echo "thats nice";
        }
        header("Location: ../account_list.php");
    }
?>