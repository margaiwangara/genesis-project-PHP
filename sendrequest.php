<?php
$error_friends = false;
if(isset($_POST['friendsend'])){
	if(($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
		//select data from database
		$email = $friemail;
		$useremail = $_SESSION['SESS_EMAIL'];
		$firstname = ucfirst($frifirst);
		$lastname = ucfirst($frilast);
		$userfname = $_SESSION['SESS_FIRSTNAME']; 
		$userlname = $_SESSION['SESS_LASTNAME'];
		$userfname = strtolower($userfname);
		$userlname = strtolower($userlname);
		$userfname = ucwords($userfname);
		$userlname = ucwords($userlname);
		//get data from table to prevent double friend requests
		$double = mysqli_query($conn,"SELECT email,senderemail FROM friends WHERE email = '$email' OR senderemail = '$email' AND email = '$useremail' OR senderemail = '$useremail'");
		$doublerows = mysqli_num_rows($double);
		if($doublerows == 1){
			$error_friends = "<font color='red'>Friend request already sent</font>";
		}else{
			if(!$error_friends){
		//insert into db
		$requestfriend = "INSERT INTO friends(friend_id,email,senderemail,senderfname,senderlname,firstname,lastname,status) VALUES('','$email','$useremail','$userfname','$userlname','$firstname','$lastname','pending')";
		$conffriend = mysqli_query($conn,$requestfriend);
		if(!$conffriend){
			$error = "<font color='red'>Request not sent because:</font>" .mysql_error();
		}else{
			$request = "<font color='green'>Friend Request Sent</font>";
			
			
		}
		
	}
	
}
	}
}


?>