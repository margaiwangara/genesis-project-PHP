<?php
session_start();
	//declare error var
	$error = $confirmrecovery = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_SESSION['RECOVERY_EMAIL'])){
	if(empty($_POST['password']) && (empty($_POST['password1']) && (empty($_POST['email'])))){
	$error = "<font color='red'>Please insert password and email</font></br>";
	}else{
		
	function test_output($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = @mysql_real_escape_string($data);
	return $data;
	}
	//define username and password. i have no idea what the hell this is, i mean, why so much code?
	$email = $_SESSION['RECOVERY_EMAIL'];
	$email1 = test_output($_POST['email']);
	$password = test_output($_POST['password']);
	$password1 = test_output($_POST['password1']);
	$encpass = md5($password);
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
	
	//validation
	if($email1 !== $email){
		$error = "<font color='red'>Email does not match with the previous input</font>";
	}else{
	if($password !== $password1){
		$error = "<font color='red'>Sorry. Passwords do not match or is less than 8 characters</font>";
	}else{
	if(strlen($password)< 8){
		$error = "<font color='red'>Password must have at least 8 characters or more</font>";
	}else{
		if(!$error){
			//check existance of email in database
			$select = mysqli_query($conn,"SELECT email FROM registration");
			$rows = mysqli_num_rows($select);
			if($rows > 0){
			$update = mysqli_query($conn,"UPDATE registration SET password = '$encpass' WHERE email = '$email1'");
			if($update){
				$confirmrecovery = "<font color='green'>Recovery Success. You can now<a href='login.php'> Log In </a> to your account</font>";
			}else{
				$error = "<font color='red'>Unable to recover password</font>";
			}
				
			}else{
				$error = "<font color='red'>Your email </font>" .$email. "<font color='red'> was not found in database</font>";
			}
		}
		
	}
	}

	}
}
}



?>