<?php
//start session
session_start();
//include database connection
require('dbconnect.php');
//include header
require('header.php');
//include request sender
require('sendrequest.php');
//include request page
require('requestaccept1.php');


?>

<?php
	//decare vars
	$denyaccess = $error = $messagesent = $rows = $friendmail = $unreadmessages = $messagebox = $display = $from = $friendfname = $friendlname = $handlemessages = false;
	//check if logged in or registered
	if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
		$usermail = $_SESSION['SESS_EMAIL'];
		//get friend data from database
		$frienddata = mysqli_query($conn,"SELECT * FROM friends WHERE email != '$usermail' OR senderemail = '$usermail' AND status='friend'");
		$friendsnumber = mysqli_num_rows($frienddata);
		while($allfriends = mysqli_fetch_assoc($frienddata)){
			$friendfname = $allfriends['firstname'];
			$friendlname = $allfriends['lastname'];
			$friendmail = $allfriends['email'];
		}
		function test_input($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				$data = @mysql_real_escape_string($data);
				return $data;

			}
			$sendername = $_SESSION['SESS_FIRSTNAME']. "&nbsp" .$_SESSION['SESS_LASTNAME'];
			$receivername = $friendfname. "&nbsp;" .$friendlname;
			$sender = $_SESSION['SESS_EMAIL'];
			$receiver = $friendmail;
		if(isset($_POST['sendmessage'])){
			$message = test_input($_POST['messagecontent']);
			if(empty($_POST['messagecontent'])){
				$error = "<font color='red'>Message cannot be blank</font>";
			}else{
				$message = test_input($_POST['messagecontent']);
			}
			
			if(!$error){
				$query ="INSERT INTO messages(message_id,sendername,receivername,sender,receiver,message,status)VALUES('','$sendername','$receivername','$sender','$receiver','$message','unread')";
				$result = mysqli_query($conn,$query);
			if(!$result){
				$error = "<font color='red'>Message Sending Failed</font>";
			}else{
				$messagesent = "<font color='green'>Message Sent to " .$receivername. "</font>";
			}
			}
		}
			$getmessages = mysqli_query($conn,"SELECT * FROM messages WHERE receiver = '$sender' OR sender='$sender'");
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
				$from = strtolower($sendername);
				$to = strtolower($receivername);
				
				//current date/date of post
				$date = "Received on:".date('D ') .date("h:i:s a");
				
				//send to file for storage and posting
				$handlemessages = "<table><tr><th><div class='poster'>" .ucfirst($from). "&nbsp; > " .ucfirst($to)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$unreadmessages. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>";
				//$handlemessages = fopen("logs/message/messages.html","w");
				//fwrite($handlemessages,"<table><tr><th><div class='poster'>" .ucfirst($from). "&nbsp > " .ucfirst($to)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$unreadmessages. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
				//fclose($handlemessages);
				//update status of database
				$messagestatus = mysqli_query($conn,"UPDATE messages SET status = 'read' WHERE receiver = '$sender'");
				
				
				
		}
	
	else{
		$denyaccess = "<font color='red'><div class='viewposts'>You need to log in to view messages. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";;
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
<div id="inboxcontent">
<form action="" method="post">
	<table>
		<tr>
			<td><div class="inboxbutton" align="right"><a href=""><input type="button" name="checkinbox" value="<?php echo "Inbox(" .$rows. ")";?>"</a></div></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><?php 
				if(isset($_SESSION['SESS_EMAIL'])){ 
					if(isset($_POST['sendmessage'])){
					$getrows = $getrows;
					if($getrows == 0){
						$nomessages;
						echo $handlemessages;
					}else{
					if($getrows > 0){
						$rows = $getrows;
						echo $handlemessages;
					}
					}}
				}
				?>
			</td>
		</tr>
	</table>
</form>
</div>
<div id="messagemiddlepiece">
<form action="" method="post">
	<table style="line-height:12px;">
		<tr>
			<td><div class="toreceiverlbl">To</div></td>
		</tr>
		<tr>
			<td><div class="toreceiver"><?php echo "<select width='100%' name='toreceiver'><option value='$friendfname'>" .$friendfname. "&nbsp;" .$friendlname. "</option></select>";?></div></td>
		</tr>
		<tr>
			<td><div class="fromuser"><input type="hidden" name="fromuser" value="<?php echo ucfirst($from);?>" size="30"/></div></td>
		</tr>
		<tr>
			<td><div class="messagecontentlbl">Message</div></td>
		</tr>
		<tr>
			<td><div class="messagecontent"><textarea name="messagecontent" rows="5" cols="50"></textarea></div></td>
		</tr>
		<tr>
			<td><div class="sendmessage"><input type="submit" value="Send" name="sendmessage"/></td>
		</tr>
		<table>
		<tr>
			<td><?php echo $denyaccess;?></td>
			<td><?php echo $error;?></td>
			<td><?php echo $messagesent;?></td>
		</tr>
	</table>
	</table>
	</table>
</form>
</div>
<div id="footer">
<div class="copyright">teenageek &copy;2015</div>

</div>
</html>