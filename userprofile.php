<?php
session_start();
	
//include header
require('header.php');
require_once('storeposts.php');
//include request sender
require('sendrequest.php');
//include request page
require('requestaccept1.php');

?>

<?php
		
	$denyaccess = $erroruni = $errorcole = $errorhigh = $errorprimary = $errorcareer = $errorhobbies = $errorlanguage = $errorlikes = false;
	$age = $bash = $day = $month = $gender = $university = $college = $highschool = $primary = $career = $year = $firstname = $lastname = $language = $likes = $hobbies = false;
	if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
		//include database
		require('dbconnect.php');
		$firstname = strtolower($_SESSION['SESS_FIRSTNAME']);
		$lastname = strtolower($_SESSION['SESS_LASTNAME']);
		$email = $_SESSION['SESS_EMAIL'];
		$query = mysqli_query($conn,"SELECT *,gender,age,day,month,year FROM registration WHERE email='$email'");
		$rows = mysqli_num_rows($query);
		
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
		//get birthday/age
		$today = date("j/F/Y");
		$splitday = explode("/",$today);
		$currentday = $splitday[0];
		$currentmonth = $splitday[1];
		$currentyear = $splitday[2];
		if($currentday == $day && $currentmonth == $month){
			$age = $currentyear - $year;
			$bash = "<font color='green'><marquee direction='left' width='60%'>Happy Birthday " .ucfirst($firstname). "&nbsp" .ucfirst($lastname). "</marquee></font>";
		}else{
			$age = $currentyear - $year;
		}
		
		$queryedu = mysqli_query($conn,"SELECT university,college,highschool,primaryschool,career,language,likes,hobbies FROM education WHERE email='$email'");
		$rowsedu = mysqli_num_rows($queryedu);
		if($rowsedu < 1){
			$erroruni = "<a href=''>Which is your university?</a>";
			$errorcole = "<a href=''>Which is your college?</a>";
			$errorhigh = "<a href=''>Which is your high school?</a>";
			$errorprimary = "<a href=''>Which is your primary school?</a>";
			$errorcareer = "<a href=''>Which is your career?</a>";
			$errorhobbies = "<a href=''>What are your hobbies?</a>";
			$errorlanguage = "<a href=''>Which languages do you speak?</a>";
			$errorlikes = "<a href=''>What do you like?</a>";
			
			}
			
			//fetch data from query
			while($getdata = mysqli_fetch_assoc($queryedu)){
			//store the data in variables
			$university = $getdata['university'];
			$college = $getdata['college'];
			$highschool = $getdata['highschool'];
			$primary = $getdata['primaryschool'];
			$career = $getdata['career'];
			$language = $getdata['language'];
			$likes = $getdata['likes'];
			$hobbies = $getdata['hobbies'];
			}
			
		if($university == ''){
			$erroruni = "<a href=''>Which is your university?</a>";
		}else{
			$university = ucwords($university);
		}
		if($college == ''){
			$errorcole = "<a href=''>Which is your college?</a>";
		}else{
			$college = ucwords($college);
		}
		if($highschool == ''){
			$errorhigh = "<a href=''>Which is your high school?</a>";
		}else{
			$highschool = ucwords($highschool);
		}
		if($primary == ''){
			$errorprimary = "<a href=''>Which is your primary school?</a>";
		}else{
			$primary = ucwords($primary);
		}
		if($career == ''){
			$errorcareer = "<a href=''>Which is your career?</a>";
		}else{
			$career = ucwords($career);
		}
		if($language == ''){
			$errorlanguage = "<a href=''>Which languages do you speak?</a>";
		}else{
			$language = ucwords($language);
		}
		if($hobbies == ''){
			$errorhobbies = "<a href=''>What are your hobbies?</a>";
		}else{
			$hobbies = ucwords($hobbies);
		}
		if($likes == ''){
			$errorlikes = "<a href=''>What do you like?</a>";
		}else{
			$likes = ucwords($likes);
		}
		}else{
		$denyaccess = "<font color='red'><div class='viewposts'>You need to log in to view this page. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";;
	}	
?>

<!DOCTYPE html>
<html>
<head>
<title>My Blog</title>
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
	<div class="bash" style="position:absolute;text-shadow:1px 1px 1px gray;"><?php echo $bash;?></div>
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
				$firstname = ucwords($firstname);
				$lastname = ucwords($lastname);
				
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
		</table>
	</div>
	<div class="others">
	<table class="otherinfo" border="0">
	<table width="60%">
		<tr>
			<th><u><b>Education</b></u></th>
			<th><a href="userinfo.php"><abbr title="Edit Info"><div class="settings"><img src="icons/profsettings.png" alt="Settings" align="right"/></div></abbr></a>
		</tr>
	</table>
	<table>
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
		</table>
		<table style="text-align:left;">
			<tr>
				<th><u>Hobbies</u></th>
			</tr>
			<tr>
				<td><a href=""><?php echo $hobbies;echo $errorhobbies;?></a></td>
			</tr>
			<tr>
				<th><u>Likes</u></th>
			</tr>
			<tr>
				<td><a href=""><?php echo $likes;echo $errorlikes;?></a></td>
			</tr>
			<tr>
				<th><u>Language</u></th>
			</tr>
			<tr>
				<td><?php echo $language;echo $errorlanguage;?></td>
			</tr>
		</table>
	</table>
	
</div>
		
</div>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>
