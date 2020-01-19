<?php 
    include_once("../../../actions/db_connection.php");
    session_start();
    $today = date("Y-m-d H:i:s");
    $id_order = $_POST['id'];
    $sql = "UPDATE `order` SET `status`= '0', `delivery_date` = DEFAULT WHERE id_order = '$id_order'";
    if ($conn->query($sql)) {
        // add activity 
        $res = mysqli_query($conn, "SELECT * from `order` WHERE id_order = '$id_order'");
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
        
            $order_code = $row["code"];
            $label = str_replace(" ","-",$order_code);
            $date = date("Y-m-d h:i:s");
            $id_adm = $_SESSION['id'];
            $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                            VALUES (11,$id_adm,'$label','$date')";
            if ($conn->query($sql_activity)) {
                echo "thats nice"; 
            }
            header("Location: ../order_list.php?success=true");
        }
    }
?>