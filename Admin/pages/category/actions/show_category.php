<?php 
    include_once("../../../actions/db_connection.php");
    session_start();
    $id_category = $_GET['id'];
    $sql = "UPDATE `category` SET `status`= '1' WHERE id_cat = '$id_category' ";
    if ($conn->query($sql)) {
        // add activity 
        $res = mysqli_query($conn, "SELECT * from category WHERE id_cat='$id_category'");
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
        }
        $cat_name = $row["label_cat"];
        $label = str_replace(" ","-",$cat_name);
        $date = date("Y-m-d h:i:sa");
        $id_adm = $_SESSION['id'];
        $sql_activity = "INSERT INTO activitylog (id_activity,id_admin,label,date)
                        VALUES (13,$id_adm,'$label','$date')";
        if ($conn->query($sql_activity)) {
            echo "thats nice"; 
        }
        header("Location: ../category_list.php?success=true"); 
    }
?>