<?php
session_start();
	
//include header
require('header.php');
require_once('storeposts.php');

?>

<?php
		
	$denyaccess = $erroruni = $errorcole = $errorhigh = $errorprimary = $errorcareer = false;
	$age = $day = $month = $gender = $university = $college = $highschool = $primary = $career = $year = $firstname = $lastname = false;
	if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
		//include database
		require('dbconnect.php');
		$firstname = strtolower($_SESSION['SESS_FIRSTNAME']);
		$lastname = strtolower($_SESSION['SESS_LASTNAME']);
		$email = $_SESSION['SESS_EMAIL'];
		$query = mysqli_query($conn,"SELECT *,gender,age,day,month,year FROM registration WHERE email='$email'");
		$rows = mysqli_num_rows($query);
		if($email != $email){
			echo "<div id='addfriendbutton'><input type='button' name='addfriend' value='Add Friend'/></div>";
		}
		
		while($mydata = mysqli_fetch_assoc($query)){
			$age = $mydata['age'];
			$day = $mydata['day'];
			$month = $mydata['month'];
			$year = $mydata['year'];
			$gender = $mydata['gender'];
			//change the month case
			$month = strtolower($month);
			$month = ucfirst($month);
			//change the gender case
			$gender = strtolower($gender);
			$gender = ucfirst($gender);
		}
		$queryedu = mysqli_query($conn,"SELECT university,college,highschool,primaryschool,career FROM education WHERE email='$email'");
		$rowsedu = mysqli_num_rows($queryedu);
		if($rowsedu < 1){
			$erroruni = "<a href=''>Which is your university?</a>";
			$errorcole = "<a href=''>Which is your college?</a>";
			$errorhigh = "<a href=''>Which is your highschool?</a>";
			$errorprimary = "<a href=''>Which is your primary school?</a>";
			$errorcareer = "<a href=''>Which is your career?</a>";
			}
			
			//fetch data from query
			$getdata = mysqli_fetch_assoc($queryedu);
			//store the data in variables
			$university = $getdata['university'];
			$college = $getdata['college'];
			$highschool = $getdata['highschool'];
			$primary = $getdata['primaryschool'];
			$career = $getdata['career'];
		if(empty($university)){
			$erroruni = $erroruni;
		}else{
			if($college == false){
			$errorcole = $erroruni;
		}else{
			if($highschool == false){
			$errorhigh = $erroruni;
		}else{
			if($primary == false){
			$errorprimary = $erroruni;
		}else{
			if($career == false){
			$errorcareer = $erroruni;
		}else{
			
		}
		}
		}
		}
		}
		
			
			
		
			
		
		
	
	}else{
		
		$denyaccess = "<font color='red'><div class='viewposts'>You need to log in to view this page. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";;
	}
		
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<style>
body{
background:url(icons/background.jpg);
background-repeat:no-repeat;

}
</style>
</head>
<header>
	<div class="logo">teenageek</div>
	<div class="links">
		<nav>
			<ul>
				<li><a href="home.php">Forum</a></li>
				<li><a href="messages.php">Messages</a></li>
				<li><a href="notifications.php">What's New</a></li>
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

<div id="profilemiddlepiece">
	<div align="center" class="errorlogin"><?php echo $denyaccess;?></div>
	<table align="center">
		<tr>
			<td><div class="profileimage"><img src="images/profpic.png" height="100px" width="100px"/></div></td>
			<td></td>
	</table>
	<table align="center">
		<tr></tr><tr></tr>
		<tr>
			<td>
			<?php
				$firstname = ucfirst($firstname);
				$lastname = ucfirst($lastname);
				
				echo "<div class='profname'><b>" .$firstname. "&nbsp;" .$lastname. "</b></div>";
			?>
			</td>
		</tr>
	</table>
	<table align="center">
		<tr>
			<td valign="top"><a href="<?php echo 'http://www.google.com/'.$career;?>" target="_blank"><?php echo $career;echo $errorcareer;?></a></td>
		</tr>
	</table>
<div class="userspace">
	<div class="userinfo">
		<table class="aboutme">
			<tr>
				<th><u>About Me</u></th>
			</tr>
			<tr></tr><tr></tr>
			<tr>
				<td>Age</td>
				<td><?php echo $age;?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?php echo $gender;?></td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td><?php echo $day. "&nbsp;" .$month. "&nbsp;" .$year. "&nbsp;";?></td>
			</tr>
			<tr>
				<td>Geekism</td>
				<td><?php echo $gender;?></td>
			</tr>
		</table>
	</div>
	<div class="others">
	<table class="otherinfo" border="0">
		<tr>
			<th><u><b>Education</b></u></th>
			<th><a href=""><abbr title="Edit Info"><div class="settings"><img src="icons/profsettings.png" alt="Settings"/></div></abbr></a></tr>
			<tr></tr><tr></tr>
			<tr>
				<td><b>University</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $university;?><?php echo $erroruni;?></a></td>
			</tr>
			<tr>
				<td><b>College</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $college;?><?php echo $errorcole;?></a></td>
				<td></td>
			</tr>
			<tr>
				<td><b>High School</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $highschool;?><?php echo $errorhigh;?></a></td>
			</tr>
			<tr>
				<td><b>Primary School</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $primary;?><?php echo $errorprimary;?></a></td>
			</tr>
			<tr>
				<th><u>Hobbies</u></th>
			</tr>
			<tr>
				<td><a href=""><?php echo $gender;?></a></td>
			</tr>
			<tr>
				<th><u>Likes</u></th>
			</tr>
			<tr>
				<td><a href=""><?php echo $gender;?></a></td>
			</tr>
			<tr>
				<th><u>Language</u></th>
			</tr>
			<tr>
				<td><?php echo $gender;?></td>
			</tr>
			
	</table>
	
</div>
		
</div>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>
