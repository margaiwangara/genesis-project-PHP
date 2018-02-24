<?php
include('dbloginconnect.php');//includes login script
?>


<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
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

<div id="loginmiddlepiece">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<fieldset>
			<div class="loginlegend">teenageek&trade; || Login.</br>Loading||Coding Just Got More Coded.</div>
			<hr/>
		<table>
		<table>
			<tr>
				
				<td><span class="error"><?php echo $errorempty;?></td>
				<td><span class="error"><?php echo $error;?></span></td>
			</tr>
		</table>
		<table>
			<tr>
				<td><div class="labelemail">E-Mail</div></td>
				<td><div class="emailbox"><input type="email" size="30" placeholder="E-Mail" name="email"></div></td>			
			</tr>
			<tr>
				<td><div class="labelpassword">Password</div></td>
				<td><div class="passwordbox"><input type="password" size="30" placeholder="Password" name="password"></div></td>			
			</tr>
			<tr>	
				<td><div class="loginaccept"><input type="submit" name="login" value="Log In"/></div></td>
				<td><div class="forgotpassword"><a href="forgotpassword.php">Forgotten Your Password?</a></div></td>
			</tr>
		</table>
			<table>
			<tr>
			<td><div class="notamember" ><font size="2px">Not A Member?</font><a href="index.php"> Join Us</a> | </div></td> 
			<td><div class="notamember"><a href="">About Teenageek&trade;</a></div></td>
			</tr>
			</table>
		
		</table>
	</fieldset>
	</form>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>
<div class="accesslinks"><a href="signup.php">Sign Up</a> | <a href="login.php">Login</a></div>
</footer>
</html>
