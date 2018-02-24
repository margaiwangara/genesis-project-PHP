<?php
//declare session
session_start();

//connect to database
include("dbconnect.php");

$successupload = $failupload = $profileimage = $getimage = $profilepic = false;
if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME']) && ($_SESSION['SESS_GENDER'])){
$email = $_SESSION['SESS_EMAIL'];
if(isset($_POST['submitprof'])){
//declare dir that the file will be stored
$target = "uploads/";
$target_file = $target.basename($_FILES['mypic']['name']);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//check authenticity of image
$check = getimagesize($_FILES['mypic']['tmp_name']);
if($check != false){
	$uploadOk = 1;
}else{
	$failupload = "<font color='red'>File is not an image</br></font>";
	$uploadOk = 0;
}
//check file existance
if(file_exists($target_file)){
	$failupload = "<font color='red'>Sorry. File already exists</br></font>";
	$uploadOk = 0;
}

//check file size
if($_FILES['mypic']['size'] > 500000){
	$failupload = "<font color='red'>Sorry. File too large</br></font>";
	$uploadOk = 0;
}
//allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" && $imageFileType != "BMP"){
	$failupload = "<font color='red'>Sorry. Wrong format</br></font>";
	$uploadOk = 0;
}

//check existance of picture in db
$getimage = mysqli_query($conn,"SELECT *,profilepic FROM userpicture WHERE useremail = '$email'");
$profimages = mysqli_num_rows($getimage);
if($profimages == 1){
	mysqli_query($conn,"UPDATE userpicture SET profilepic = '$target_file' WHERE useremail = '$email'");
}elseif($profimages < 1){
//write info to db
$insertpic = mysqli_query($conn,"INSERT INTO userpicture(pic_id,useremail,profilepic,date) VALUES('','$email','$target_file','')");
if(!$insertpic){
	echo "Upload not inserted into database";
}}
//check if uploadok is set to 0 by an error
if($uploadOk = 0){
	$failupload = "<font color='red'>Sorry. Upload Failed</br></font>";
}else{
//write photo to database
if(move_uploaded_file($_FILES['mypic']['tmp_name'],$target_file)){
//tell if file is ok
	$successupload = "<font color='green'>Your profile picture has been uploaded successfully.</br></font>";

}else{
	$failupload = "<font color='red'>Sorry. File upload failed</br></font>";
}}}
	while($fetchimage = mysqli_fetch_array($getimage)){
		$profilepic = $fetchimage['profilepic'];
	}
	$profileimage = "uploads/".$profilepic;

if($profilepic == ''){
	$profileimage = "<img src='images/profile.jpg'/>";
}else{
	$profileimage = "uploads/".$profilepic;
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Profile Picture</title>
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<link rel="stylesheet" type="text/css" href="styles/userinfo.css"/>
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

<div id="notificationsmiddlepiece">
	<div class="welcome">Welcome To Teenageek</div>
	<hr width="70%"/>
	<div class="uploadintro">Upload Your Profile Image</div>
	<div class="uploadform" align="center">
		<form action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<table class="userprofile">
					<tr>
						<td><img src="<?php echo $profileimage;//echo $profilepic;?>"/></td>
					</tr>
				</table>
				<table border="0">
					<tr>
						<td><input type="hidden" name="size" value="350000"/></td>
					</tr>
				</table>
				<table style="position:absolute;top:63%;left:35%;">
					<tr>
						<td><input type="file" name="mypic" value="Get Pic"/></td>
					</tr>
				</table>
				<table style="position:absolute;top:72%;left:43%;">
					<tr>
						<td><input type="submit" name="submitprof" value="Upload"/></td>
					</tr>
				</table>
				<table>
					<tr>
						<td style='position:absolute;right:30%;text-align:center;top:80%;'><?php echo $successupload;echo $failupload;?></td>
					</tr>
				</table>
				<div class="nextpage" style="float:right;top:93%;left:95%;position:absolute;"><a href="home.php">Skip</a></div>
			</fieldset>
		</form>
	</div>
</div>

<footer>
<div class="copyright">teenageek &copy;2015</div>

</footer>
</html>