<?php
//start session
session_start();
//include database connection
require('dbconnect.php');

?>
<?php
	$denyaccess = false;
	if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
			$getmessages = mysqli_query($conn,"SELECT *,message FROM messages WHERE status = 'unread'");
			$getrows = mysqli_num_rows($getmessages);
			if($getrows == 0){
				$rows = 0;
				}else{
					if($getrows > 0){
						$rows = $getrows;
					}
				}
			//get all messages
			while($messagecollection = mysqli_fetch_assoc($getmessages)){
				$unreadmessages = $messagecollection['message'];
					
				}
				//convert session names to lowercase
				$from = strtolower($_SESSION['SESS_FIRSTNAME']);
				$to = strtolower($_SESSION['SESS_LASTNAME']);
				//current date/date of post
				$date = "Received on:".date('D ') .date("h:i:s a");
				
				//send to file for storage and posting
				$handlemessages = fopen("logs/message/messages.html","a");
				fwrite($handlemessages,"<table><tr><th><div class='poster'>" .ucfirst($from). "&nbsp > " .ucfirst($to)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$unreadmessages. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
				fclose($handlemessages);
	}else{
		$denyaccess = "<font color='red'><div class='viewposts'>You need to log in to view messages. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Messages</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
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
				<li><a href="index.php">Forum</a></li>
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

<div id="messagemiddlepiece">
	<table>
		<tr>
			<td><a href ="messages.php">Send Message </a> <b>|</b> </td>
			<td><a href="inbox.php">Inbox<?php echo "(" .$rows. ")";?></a></td>
		</tr>
		<tr>
			<td><?php echo $denyaccess;?></td>
		</tr>
	</table>
	</form>
	<div class="messagesextract">
		<?php 
		$viewposts = false;
		if(isset($_SESSION['SESS_EMAIL'])){
			include "logs/message/messages.html";
		}else{
			$viewposts = "<font color='red'><div class='viewposts'>You need to log in to view or send messages. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";
		}
		?>
	</div>
	</table>
</div>
<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>