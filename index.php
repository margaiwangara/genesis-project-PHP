<?php
session_start();

$firstname = $lastname = $confirmemail = $email = $password = $confirmpassword = $day = $month = $year = $gender = $age = '';
$error = $errconfirmpassword = $errconfirmemail = $ageerror = $regsuccess = '';
$greeting = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$firstname = test_input($_POST['firstname']);
$lastname = test_input($_POST['lastname']);
$email = test_input($_POST['email']);
$confirmemail = test_input($_POST['confirmemail']);
$password = test_input($_POST['password']);
$confirmpassword = test_input($_POST['confirmpassword']);
$encpassword = md5($password);
$confirmcodeemail =rand(1, 1000);
//get leap year
//validating comboboxes
//isset determines if a variable is set 
if(isset($_POST['day'])){
$day = test_input($_POST['day']);
}else{
	$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
}
if(isset($_POST['month'])){
$month = test_input($_POST['month']);
}else{
	$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
}

/*acquisition of a leap year. I could probably use the leap year function but discovery requires experimentation.
I don't even understand why I wrote this code in the first place*/
if(isset($_POST['year'])){
	if(($year%4) == 0 && $month == "february"){
		//the error is actually here. There should be an if function.
		$day <=28;
	}else{
		if(($year%4 != 0) && ($month == "february") && $day >=29){
			$day <=29;
		}else{
			$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
		}
		if(!$error){
			$year = test_input($_POST['year']);
		}
	}
}
if(isset($_POST['gender'])){
$gender = test_input($_POST['gender']);
}
$yeartoday = date("Y");
$age = $yeartoday - $year;
$fnamelower = strtolower($firstname);
$lnamelower = strtolower($lastname);
$monthlower = strtolower($month);
$genderlower = strtolower($gender);
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = @mysql_real_escape_string($data);
	return $data;
}


?>

<?php
$firstname = $lastname = $confirmemail = $email = $password = $confirmpassword = $day = $month = $year = $gender = $age = '';
$error = $errconfirmpassword = $errconfirmemail = '';
$dir='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['firstname'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$firstname = test_input($_POST["firstname"]);
	 
	}
	
	
	if(empty($_POST['lastname'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$lastname = test_input($_POST["lastname"]);
	}
	
	
	if(empty($_POST['email'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errconfirmemail = "<font color='red'>Invalid email format</font>"; 
	}
	}
	
	if(empty($_POST['confirmemail'])){
		$error = "<font color='red'>Registration Failed!!All fields must be filled</font>";
	}else{
		$confirmemail = test_input($_POST["confirmemail"]);
		if($email != $confirmemail){
		$errconfirmemail = "<font color='red'>Emails do not match!!</font>";
	}
		
	}		
	
	if(empty($_POST['password'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
		$password = test_input($_POST["password"]);
		if (strlen($password)< 8){
		$errconfirmpassword = "<font color='red'>Password must have at least 8 characters or more</font>"; 
		if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
		$errconfirmpassword = "<font color='red'>Only letters and white space allowed</font>"; 
	}
		}
	}
	if(empty($_POST['confirmpassword'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$confirmpassword = test_input($_POST["confirmpassword"]);
	if($password != $confirmpassword){
		$errconfirmpassword = "<font color='red'>Passwords don't match!!</font>";
	}
	}
		
	if(empty($_POST['day'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$day = test_input($_POST["day"]);
	}
	
	
	if(empty($_POST['month'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$month = test_input($_POST["month"]);
	}
	
	
	if(empty($_POST['year'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$year = test_input($_POST["year"]);
	}
	
	
	if(empty($_POST['gender'])){
		$error = "<font color='red'>Registration Failed!All fields must be filled</font>";
	}else{
	$gender = test_input($_POST["gender"]);
	}
	if(!$error){
					
			if(!$errconfirmpassword){
				
				if(!$errconfirmemail){
							
		include("dbconnect.php");
		$retrieve = mysqli_query($conn,"SELECT email FROM registration WHERE email = '$email'");
		$rows_confirm = mysqli_num_rows($retrieve);
		if($rows_confirm > 0){
			$error = "<font color='red'>The email already exists in our database. Please use another email</font>";
		}else{
		if(!$error){
		
		$query = "INSERT INTO registration(firstname,lastname,email,password,day,month,year,gender,age,confirmedemail,confirmcodeemail) VALUES('$fnamelower','$lnamelower','$email','$encpassword','$day','$monthlower','$year','$genderlower','$age','0','$confirmcodeemail')";
		$result= mysqli_query($conn,$query);
		
		if(!$result){
		echo "<font color='red'><b>Registration Failed</b></font>" .mysql_error();
		}else{
			$to = $email;
			$subject = "Hello, " .ucfirst($fnamelower)."<br/><b><u>Teenageek Email Confirmation</u></b>";
			$body = "Please click on the link below to activate your account<br/><a href='login.php'>
					localhost/teenageek/login.php?email=$email&code=$confirmcodeemail</a> or <a href='login.php'>Click Here</a>";
					
			$handle = fopen("logs/emails.html","a");
			$sendmail = fwrite($handle,"<font style='line-height:30px;'></br>" .$to."</br>" .$subject. "</br>" .$body. "</font>");
			fclose($handle);
			//$sendmail = mail($to,$subject,$body);
			if($sendmail){
			$regsuccess = "<font color='green'>Registration Success. Please Check Your E-Mail To <a href='login.php'>Login</a></font>";
			}else{
				$error = "<font color='red'>Email sending failed</font>";
			}
			$_SESSION['MY_EMAIL'] = $email;
			$_SESSION['SESS_FIRSTNAME'] = $firstname;
			$_SESSION['SESS_LASTNAME'] = $lastname;
			$regsuccess = "<font color='green'>Registration Success. Please Check Your E-Mail To Confirm SignUp</font>";
		}
		$getcode = mysqli_query($conn,"SELECT * FROM registration WHERE confirmcodeemail = '$confirmcodeemail'");
		while($coderow = mysqli_fetch_assoc($getcode)){
			$dbcode = $coderow['confirmcodeemail']; 
			}
		if($dbcode = $confirmcodeemail){
						
			mysqli_query($conn,"UPDATE registration SET confirmedemail= '1' WHERE email='$email'");
			mysqli_query($conn,"UPDATE registration SET confirmcodeemail = '0' WHERE email='$email'");
								
		}else{
			$error = "Email and code don't match";
		}

		}
		}
	}}
				
			}
		else{
			$error = "<font color='red'>Registration Failed. All Records Must Be Filled Appropriately</font>";
}}
	//mysqli_close($conn);
	


?>
<?php

//connect to database
require_once('dbconnect.php');

?>


<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<style>
body{
background:url(icons/background.jpg);
background-repeat:no-repeat;

}
</style>
</head>
<header>
	<div class="logo">teenageek</div>
</header>

<div id="signupmiddlepiece">
	<form action=" " method="post">
		<fieldset>
		
				<div class="signuplegend">Join Us. Learn A LOT. Just Codes</div>
				<hr/>
		<table>			
			<tr>
				<td><div class="labelfname">First Name</div></td>
				<td><div class="labellname">SurName</div></td>
			</tr>
			<tr>
				<td><div class="firstnamebox"><input type="text" placeholder="Enter First Name" size="30" name="firstname"/></div></td>
				<td><div class="lastnamebox"><input type="text" placeholder="Enter Last Name" size="30" name="lastname"/></div></td>
			</tr>
		<table>
			<tr>
				<td><div class="labelemail">E-Mail</div></td>
				<td><div class="labelconfirmmail">Confirm E-Mail</div></td>
			</tr>
			<tr>
				<td><div class="emailbox"><input type="email" name="email" placeholder="E-Mail" size="30"/></div></td>
				<td><div class="confirmemailbox"><input type="email" name="confirmemail" placeholder="Confirm E-Mail" size="30"/></div></td>
			</tr>
			<tr>
				<td><div class="labelpassword">Password</div></td>
				<td><div class="labelconfpassword">Confirm Password</div></td>
			</tr>
			<tr>
				<td><div class="passwordbox"><input type="password" name="password" placeholder="Password" size="30"/></div></td>
				<td><div class="confirmpasswordbox"><input type="password" name="confirmpassword" placeholder="Confirm Password" size="30"/></div></td>
			</tr>
					
		</table>
		<table>
			<tr>
				<td><div class="dateofbirth">Date of Birth:</div></td>
			</tr>
			<tr>
				<td><div class="daybox">
				<select name="day">
					<option value="" disabled selected>Select Day</option>
					<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
					<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
					<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
					<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
					<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
					<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
					<option value="31">31</option>
				</select></div></td>
				<td><div class="monthbox">
				<select name="month">
					<option value="" disabled selected>Select Month</option>
					<option value="january">January</option><option value="february">February</option><option value="march">March</option><option value="april">April</option><option value="may">May</option>
					<option value="june">June</option><option value="july">July</option><option value="august">August</option><option value="september">September</option><option value="october">October</option>
					<option value="november">November</option><option value="december">December</option>	
					
				</select>
				</div></td>
				<td><div class="yearbox">
				<select name="year">
					<option value="" disabled selected>Select Year</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option>
					<option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option>
					<option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option>
					<option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option>
					<option value="2003">2003</option>
				</select>		
				</div></td>
			</tr>
		</table>
		<table>	
			
			<tr>
				<td><div class="labelgender">Gender</div></td>
				<!--<td><div class="labelage">Age</div></td>-->
			</tr>
			<tr>
				<td><div class="genderbox"><select name="gender">
					<option value="" disabled selected>Select Gender</option>
					<option value="male" name="gender">Male</option>
					<option value="female" name="gender">Female</option>
				</select></div></td>
				<!--<td><div class="agebox"><input type="text" placeholder="Age" name="age" size="15"/></div></td>-->
			</tr>		
			<tr>
				<td><div class="buttonsignup"><input type="submit" name="signup" value="Join Us"/></td>
			</tr>
			<table>
			<tr>
				<td><span class="error"><?php echo $error;?></span></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo $errconfirmpassword;?></span></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo $errconfirmemail;?></span></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo $ageerror;?></span></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo $regsuccess;?></span></td>
			</tr>
			</table>
		</table>
			<br/>
				<div class="like">Like Us:</div>
				<div class="sociallike"><a href=""><img src="icons/facebook.png" alt="facebook"> Facebook</a> <a href=""><img src="icons/facebook.png" alt="twitter"> Twitter</a></div>	
		</fieldset>
	</form>
</div>

<footer>
<div class="copyright">teenageek &copy;<?php echo date(" Y ");?></div>
<div class="accesslinks"><a href="signup.php">Sign Up</a> | <a href="login.php">Login</a></div>
</footer>
</html>