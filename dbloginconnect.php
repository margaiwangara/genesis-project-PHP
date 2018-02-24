<?php
session_start();//start sesssion
$error = $errorempty = '';//stores errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['email']) && (empty($_POST['password']))){
	$errorempty = "<font color='red'>Username or Password Field Blank</font></br>";
	}else{
		
	function test_output($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = @mysql_real_escape_string($data);
	return $data;
	}
	//define username and password
	$email = test_output($_POST['email']);
	$password = test_output($_POST['password']);
	$encpassword = md5($password);
	//establish connection with server
	$conn = mysqli_connect("localhost","root","","teenageek");
	//check connection
	if(!$conn){
		echo "<font color='red'>Connection failed<br/></font>";
	}
	
	}
	//connect to database
	$db = mysqli_select_db($conn,"teenageek");
	if(!$db){
		echo "<font color='red'>Database Connection Failed<br/></font>";
	}
	//query to fetch information from database
	$sql="SELECT * FROM registration WHERE email ='$email' AND password='$encpassword'";
	$query = mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)> 0) {
		$getcontent = mysqli_fetch_assoc(($query));
		$getfirstname = $getcontent['firstname'];
		$getlastname = $getcontent['lastname'];
		$getgender = $getcontent['gender'];
		$_SESSION['SESS_EMAIL'] = $email;
		$_SESSION['SESS_FIRSTNAME'] = $getfirstname;
		$_SESSION['SESS_LASTNAME'] = $getlastname;
		$_SESSION['SESS_GENDER'] = $getgender;
		mysqli_free_result($getcontent);
		header("location:home.php");
	}else{
	$error = "<font color='red'>Invalid Username or Password</font>";
	}
	
	mysqli_close($conn);
	}


?>