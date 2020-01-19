<?php
	session_start();
	echo '<script type="text/javascript">'; 
	echo 'alert("you are deconnected successefuly come back soon !!");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
	session_destroy();
?>