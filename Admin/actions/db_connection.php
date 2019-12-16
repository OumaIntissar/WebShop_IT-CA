<?php

session_start();

$connection = @mysql_connect('localhost:3306', 'root', '');
if (!$connection){
    header("Location: ../../404.html");
}
$database = mysql_select_db("it_ca_db",$connection);
mysql_query ('SET NAMES \'UTF8\'');
if (!$database){
    header("Location: ../../404.html");
}

?>