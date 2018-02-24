<?php
//start session
session_start();
//connect with storeposts.php
require_once('storeposts.php');

$greetinguser = $greetingguest = $postengage = $error = $suggestion = $request = $frifirst = $frilast = $suggestion = false;
$requestrows = 0;
if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME']) && ($_SESSION['SESS_GENDER'])){
	$firstname = strtolower($_SESSION['SESS_FIRSTNAME']);
	$lastname = strtolower($_SESSION['SESS_LASTNAME']);
	
	if($_SESSION['SESS_GENDER'] == "MALE"){
			$greetinguser = "<img src='icons/userhover.png' name='userpropic'/><b> Mr.</b> ".ucfirst($firstname). "&nbsp" .ucfirst($lastname);
	}else{
		if($_SESSION['SESS_GENDER'] == "FEMALE"){
			$greetinguser = "<img src='icons/userhover.png' name='userpropic'/><b> Miss.</b> ".ucfirst($firstname). "&nbsp" .ucfirst($lastname);

		}
	}
	
	//current date/date of post
	$date = "Posted on:".date('D ') .date("g")+1 .date(":i:s a");
	//include database
	include('dbconnect.php');
	$email = $_SESSION['SESS_EMAIL'];
	$sql="SELECT * FROM friends WHERE status='friend'";
	$friends = mysqli_query($conn,$sql);
	$friendrows = mysqli_num_rows($friends);
	//echo $friendrows;
	if($friendrows < 1){
		
		$suggestquery = mysqli_query($conn,"SELECT *,firstname,lastname,email FROM registration WHERE email != '$email'");
		$suggestrows = mysqli_num_rows($suggestquery);
		while($fetchsuggestion = mysqli_fetch_assoc($suggestquery)){
			$frifirst = $fetchsuggestion['firstname'];
			$frilast = $fetchsuggestion['lastname'];
			$friemail = $fetchsuggestion['email'];
		}
		$frifirst = strtolower($frifirst);
		$frilast = strtolower($frilast);
		//include request sender
		require('sendrequest.php');
		//include request page
		require('requestaccept1.php');
		//declare request message variable
		$request = $request;
		$error = $error;
		$splitfriend = explode(" ",$frifirst);
		$splitfriend1 = $splitfriend[0];		
	}else{
		
	}
		
	}else{
	$greetingguest = "<img src='icons/male.png' name='guestpropic'/><b> Hello:</b> Guest";
	
	
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Forum</title>
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

<div id="indexmiddlepiece">
	<div class="suggestionbox" align="center"><?php echo $suggestion;?></div>
	<form action="" method="post">
	<div class="post">
		<textarea rows="5" cols="70" name="post" placeholder="What's Up?"></textarea>
	</div>
	<table border="0">
		<tr>
		<td><div class="postbutton"><input type="submit" value="Post  " name="postitem"/></div></td>
		<!--<td><div class="comment"><a href="">Comment</a></div></td>-->
		<td><img src="icons/picture.png" alt="addimage"/></td>
		<td><img src="icons/map.png" alt="yourlocation"/></td>
		<td>
			<select name="postprivacy">
				<option value="friends">Friends</option>
				<option value="friendsoffriends">Friends of Friends</option>
				<option value="everyone" selected>Everyone</option>
				<option value="family">Family</option>
				<option value="private">Private</option>
			</select>
		</td>
		</tr>
		<tr>
			<td>
			<?php
				if(isset($_POST['postcomm'])){
					echo "<textarea name='postcomment' rows='1' cols='20'></textarea>";
					}
			?>
			</td>
		</tr>
	</table>
	<hr width="95%"/>
	<?php 
		$viewposts = false;
		if(isset($_SESSION['SESS_EMAIL'])){
			include "logs/posts/everyone.html";
			include "logs/posts/friends.html";
		}else{
			$viewposts = "<font color='red'><div class='viewposts'>You need to log in to view or share posts. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";
		}
	?>
	<table align="center">
		<tr>
			<td><div class='mustlogin'><?php echo $viewposts;?></div></td>
			<td><div class='mustlogin'><?php echo $error;?></div></td>
		</tr>
	</table>
	</form>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>

