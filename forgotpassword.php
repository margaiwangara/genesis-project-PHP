<?php
include('recoverpassword.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Recover Password</title>
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
			<div class="passwordreclegend">Recover Password</div>
			<hr/>
		<table>
			<tr>
				<td><div class="labelemail">E-Mail</div></td>
				<td><div class="emailbox"><input type="email" size="30" placeholder="E-Mail" name="email"></div></td>			
			</tr>
		<table>
			<tr>	
				<td><div class="recoverpasssubmit"><input type="submit" name="recoverpasswordmail" value="Recover"/></div></td>
			</tr>
			<table>
			<tr>
				<td><div class="recoverpasserror"><?php echo $error;?></div></td>
				<td><div class="recoverpasserror"><?php echo $recoverpassconfirm;?></div></td>
			</tr>
			</table>
		</table>
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