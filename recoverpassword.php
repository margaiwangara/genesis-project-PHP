<?php
	session_start();
	//declare error var
	$error = $recoverpassconfirm = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['email'])){
	$error = "<font color='red'>Please insert an email address</font></br>";
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
	//establish connection with server
	$conn = mysqli_connect("localhost","root","","teenageek");
	$confirmcoderecovery = rand(1,19965);
	//check connection
	if(!$conn){
		echo "<font color='red'>Connection failed<br/></font>";
	}
	
	
	//connect to database
	$db = mysqli_select_db($conn,"teenageek");
	if(!$db){
		echo "<font color='red'>Database Connection Failed<br/></font>";
	}
	$query = mysqli_query($conn,"SELECT email FROM registration WHERE email = '$email'");
	//insert code into database
	$insertcode = mysqli_query($conn,"UPDATE registration SET confirmcoderecovery = '$confirmcoderecovery' WHERE email = '$email'");
	if(!$insertcode){
		echo "Random code not inserted";
	}else{
		
	
	//query to fetch information from database
	$query = mysqli_query($conn,"SELECT email FROM registration WHERE email = '$email'");
	
	$num_rows = mysqli_num_rows($query);
	if($num_rows == 1){
		
					
					$to = $email;
					$subject = "<b>Teenageek Password Recovery</b>";
					$body = "Please click on the link below to reset your password<br/><a href='recoverpassworddb2.php'>
							localhost/teenageek/recoverpassword2.php?email=$email&code=$confirmcoderecovery</a> or <a href='recoverpassword2.php'>Click Here</a>";
					
					$handle = fopen("passwordrecovery.html","a");
					$sendmail = fwrite($handle,"<font>" .$to."</br>" .$subject. "</br>" .$body. "</font>");
					fclose($handle);
					//$sendmail = mail($to,$subject,$body);
					if($sendmail){
						$recoverpassconfirm = "<font color='green'>Your email</font> " .$email. " <font color='green'>has been located in our database. Please check your email inbox to reset your password.</font>";
					}
					$getcode = mysqli_query($conn,"SELECT * FROM registration WHERE confirmcoderecovery = '$confirmcoderecovery'");
					while($coderow = mysqli_fetch_assoc($getcode)){
						$dbcode = $coderow['confirmcoderecovery']; 
					}
					if($dbcode = $confirmcoderecovery){
						
						mysqli_query($conn,"UPDATE registration SET confirmedrecovery = '1' WHERE email='$email'");
						mysqli_query($conn,"UPDATE registration SET confirmcoderecovery = '$confirmcoderecovery' WHERE email='$email'");
						$_SESSION['RECOVERY_EMAIL'] = $email;
						
					}else{
						$error = "Email and code don't match";
					}
				
				
		}else{
		$error = "<font color='red'> Your email is not in our database. Please try again</font>";
	}


}
}
}



?>