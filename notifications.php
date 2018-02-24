<?php
session_start();
	
//include header
require('header.php');
//include request sender
require('sendrequest.php');
//include request page
require('requestaccept1.php');
require('dbconnect.php');

?>

<?php
		
	$denyaccess = $birthdaynotification = $friendnotification = false;
	if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
		$mymail = $_SESSION['SESS_EMAIL'];
		$getnotification = mysqli_query($conn,"SELECT *,email,senderfname,senderlname FROM friends WHERE email = '$mymail' AND status = 'pending'");
		$mynotification = mysqli_num_rows($getnotification);
		while($fetchnotification = mysqli_fetch_assoc($getnotification)){
			$senderfname = $fetchnotification['senderfname'];
			$senderlname = $fetchnotification['senderlname'];
		} 
		if($mynotification > 0){
			$friendnotification = "<u><b>" .date("j F Y"). "</b></u><br/>You have " .$mynotification. " friend requests from <a href='requestaccept.php'>" .$senderfname. "&nbsp;" .$senderlname. "</a>";
		}
		$todaydate = date("j/F");
		$splitdate = explode("/",$todaydate);
		
		$birthquery = mysqli_query($conn,"SELECT *,firstname,lastname,day,month FROM registration WHERE email != '$mymail'");
		$birthrow = mysqli_num_rows($birthquery);
		while($fetchdate = mysqli_fetch_assoc($birthquery)){
			$birthday = $fetchdate['day'];
			$birthmonth = $fetchdate['month'];
			$firstname = $fetchdate['firstname'];
			$lastname = $fetchdate['lastname'];
		}
		$todayday = strtolower($splitdate[0]);
		$todaymonth = strtolower($splitdate[1]);
		$birthday = strtolower($birthday);
		$birthmonth = strtolower($birthmonth);
		$firstname = strtolower($firstname);
		$lastname = strtolower($lastname);
		if($birthday == $todayday && $birthmonth == $todaymonth){
			$birthdaynotification = "<u><b>" .date("j F Y"). "</b></u><br/>Your friend&nbsp;" .ucwords($firstname). "&nbsp;" .ucwords($lastname). "&nbsp;has a birthday today. <a href=''>Click here to view profile</a>.<br/>";
		}
		
	}else{
		
		$denyaccess = "<font color='red'><div class='viewposts'>You need to log in to view this page. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";;
	}
		
?>

<!DOCTYPE html>
<html>
<head>
<title>Notifications</title>
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

<div id="notificationsmiddlepiece">

	<div class="birthday"><?php 
	if(isset($_SESSION['SESS_EMAIL'])){
		echo $birthdaynotification;echo $friendnotification;
	}
		?></div>
	<div align="center" class="errorlogin"><?php echo $denyaccess;?></div>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>
