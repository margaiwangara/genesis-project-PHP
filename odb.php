<?php 
$servername="localhost";
$username="root";
$password="";
//create connection
$conn=mysqli_connect($servername,$username,$password);
//check connection
if(!$conn){
	die("connection failed".mysql_connect_error());
}
//create database
$sql="CREATE DATABASE omamo";
if (mysqli_query($conn,$sql)){
	echo "database created succesfully";
	
}else {
	echo "error creating db" . mysqli_error($conn);
	
}
mysqli_close($conn);
?>