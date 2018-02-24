<?php
$greetinguser = $greetingguest = $postengage = $error = false;

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
	$date = "Posted on:".date('D ') .date("h:i:s a");
		
	}else{
	$greetingguest = "<img src='icons/male.png' name='guestpropic'/><b> Hello:</b> Guest";
	
	
}

?>