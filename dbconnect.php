<?php

$conn = mysqli_connect("localhost","root","");
//check connection
if(!$conn){
	echo "<font color='red'>Connection failed<br/></font>";
}
//connect to database
$db = mysqli_select_db($conn,"teenageek");
if(!$db){
	echo "<font color='red'>Database Connection Failed<br/></font>";
}



?>