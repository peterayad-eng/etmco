<?php
	require_once "../connect.php";	
	
	$connec = new con();
	
	require_once "header.php";
	require_once "productpreview.php";
	require_once "footer.php";
	
	$connec->close();
?>