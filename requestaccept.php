<?php
session_start();

//include request.php
require('requestaccept1.php');
?>

<?php
		
	$denyaccess = false;
		if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
			
		}
	else{
		$denyaccess = "<font color='red'><div class='viewposts'>You need to log in to view this page. <a href='login.php'>Log in</a> |<a href='signup.php'> Register</a></div></font>";;
	}
	
	
	
		
?>

<!DOCTYPE html>
<html>
<head>
<title>Friend Requests</title>
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

<div id="acceptrequest">
	<form action='' method='post'>
	<fieldset class='acceptfriends'>
		<table>
			<tr>
				<th color='brown'>Friend Requests[<?php echo $requestrows;?>] </th>
			</tr>
		</table>
		<table>
			<tr>
				<td><?php echo ucfirst($firstname);?><?php echo $norequests;?></td>
				<td><?php echo ucfirst($lastname);?></td>
			</tr>
		</table>
		<table>
			<tr>
				<td><input type='submit' value='Accept Request' name='friendaccept'/></td>
				<td><input type='submit' value='Delete Request' name='frienddelete'/></td>
			</tr>
		</table>
		<table>
			<tr>
				<td><?php echo $request;?></td>
			</tr>
		</table>
		</table>
	</fieldset>
	</form>
	<div align="center" class="errorlogin"><?php echo $denyaccess;?></div>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>
