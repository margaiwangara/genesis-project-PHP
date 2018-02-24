<?php
//start session
session_start();
//include request sender

$requestrows = $success = $error = $colle = $high = $primo = $lang = $hobby = $like = $careerz = $uni = false;
if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
	include('sendrequest.php');
	//include request page
	include('requestaccept1.php');
	include('dbconnect.php');
	
	$email = $_SESSION['SESS_EMAIL'];
	$usedata = mysqli_query($conn,"SELECT *,firstname,lastname FROM registration WHERE email = '$email'");
	$userow = mysqli_num_rows($usedata);
	while($usefetch = mysqli_fetch_assoc($usedata)){
		$getfname = $usefetch['firstname'];
		$getlname = $usefetch['lastname'];
	}
	$userdata = mysqli_query($conn,"SELECT * FROM education WHERE email='$email'");
	$userrow = mysqli_num_rows($userdata);
	while($userfetch = mysqli_fetch_assoc($userdata)){
		$uni = $userfetch['university'];
		$colle = $userfetch['college'];
		$high = $userfetch['highschool'];
		$primo = $userfetch['primaryschool'];
		$lang = $userfetch['language'];
		$hobby = $userfetch['hobbies'];
		$like = $userfetch['likes'];
		$careerz = $userfetch['career'];
	}
	if(isset($_POST['updateinfo'])){

//declare variables
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$university = $_POST['university'];
$college = $_POST['college'];
$highschool = $_POST['highschool'];
$primaryschool = $_POST['primary'];
$language = $_POST['language'];
$hobbies = $_POST['hobbies'];
$likes = $_POST['likes'];
$careers = $_POST['career'];
if($userrow < 1){
	$insertdata = "INSERT INTO education(education_id,email,university,college,primaryschool,career,language,hobbies,likes,highschool)VALUES('','$email','$university','$college','$primaryschool','$careers','$language','$hobbies','$likes','$highschool')";
	$result = mysqli_query($conn,$insertdata);
	if($result){
		$success = "<font color='green'>Your Information Has Been Saved</font>";
	}else{
		echo "Failed" .mysql_error();
	}
	}else{
		//update information
		$updateinfo = mysqli_query($conn,"UPDATE education SET university = '$university',college = '$college',highschool = '$highschool',primaryschool = '$primaryschool',career = '$careers',language = '$language',hobbies = '$hobbies',likes = '$likes' WHERE email = '$email'");
		$update = mysqli_query($conn,"UPDATE registration SET firstname = '$firstname',lastname = '$lastname' WHERE email = '$email'");

	if($updateinfo || $update){
		$success = "<font color='green'>Your Information Has Been Saved</font>";
	}else{
		$error = "<font color='red'>Your Information Failed To Be Saved</font>";
	}
	}
}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<meta charset="UTF-8" http-equiv=""/>
<link rel="stylesheet" type="text/css" href="styles/userinfo.css"/>
<script type="text/javascript" src="js/popup.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<style>
body{
background:url(icons/background.jpg);
background-repeat:no-repeat;

}
</style>
</script>
</head>
<body>
<header>
	<div class="logo">teenageek</div>
	<div class="links">
		<nav>
			<ul>
				<li><a href="home.php">Forum</a></li>
				<li><a href="messages.php">Messages</a></li>
				<li><a href="notifications.php">What's New
				<?php
					if(isset($_SESSION['SESS_EMAIL'])){
					echo "<font color='red'><b> (" .$requestrows. ") </b></font>";
					}
				?>
				</a></li>
				<li><a href="userprofile.php">My Blog</a></li>
				<li><a href=""><div class="settings"><img src="icons/settings.png" alt="Settings"/></div></a>
					<ul>
						<li><a href="">General</a></li>
						<li><a href="">Privacy</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>	
</header>
<div id="editprofile">
	<form class="" action="" method="post">
		<fieldset>
			<table>
				<tr>
					<td><b><u>About Me</b></u></td>
				</tr>
			<table>
				<tr>
					<td>First Name</td>
					<td>Last Name</td>
				</tr>
				<tr>
					<td><input type="text" name="fname" value='<?php echo ucwords($getfname);?>' placeholder="First Name" size="30"/></td>
					<td><input type="text" name="lname" value='<?php echo ucwords($getlname);?>' placeholder="Last Name" size="30"/></td>
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
					<td><b><u>Education</b></u></td>
			</table>
			<table border="0">
				</tr>
				<tr>
					<td>University</td>
					<td>College</td>
				</tr>
				<tr>
					<td><input type="text" name="university" value='<?php echo ucwords($uni);?>' placeholder="University" size="30"/></td>
					<td><input type="text" name="college" value='<?php echo ucwords($colle);?>' placeholder="College" size="30"/></td>
				</tr>
				<tr>
					<td>High School</td>
					<td>Primary School</td>
				</tr>
				<tr>
					<td><input type="text" name="highschool" value='<?php echo ucwords($high);?>' placeholder="High School" size="30"/></td>
					<td><input type="text" name="primary" value='<?php echo ucwords($primo);?>' placeholder="Primary School" size="30"/></td>
				</tr>
			<table>
				<tr>
					<td>Language</td>
					<td>Career</td>
				</tr>
				<tr>
					<td><input type="text" name="language" value='<?php echo ucwords($lang);?>' placeholder="Language" size="30"/></td>
					<td><input type="text" name="career" value='<?php echo ucwords($careerz);?>' placeholder="Career" size="30"/></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>Hobbies</td>
				</tr>
				<tr>
					<td><textarea cols="30" rows="3" name="hobbies"><?php echo ucwords($hobby);?></textarea></td>
				</tr>
				<tr>
					<td>Likes</td>
				</tr>
				<tr>
					<td><textarea cols="30" rows="3" name="likes"><?php echo ucwords($like);?></textarea></td>
				</tr>
				<tr>
					<td><?php echo $success;echo $error;?></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><input type="submit" name="updateinfo" value="Save"/></td>
					<td></td><td></td><td></td><td></td>
					<td><a href="userprofile.php">Go Back To Profile</a> | </td>
					<td><a href="index.php">Skip</a></td>
				</tr>
			</table>
			</table>
		</fieldset>
	</form>
</div>
</body>



</html>