<?php
	session_start();
	if(session_destroy()){
	$loggedout = "You are logged out";
	header("location:index.php");//redirect to homepage

	}
?>