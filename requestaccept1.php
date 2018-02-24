<?php
//add database
require('dbconnect.php');

	$norequests = $request = $requestrows = false;
if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
	$email = $_SESSION['SESS_EMAIL'];
	require('sendrequest.php');
	//declare extraction of data from query
	$getrequests = mysqli_query($conn,"SELECT senderfname,senderlname,email FROM friends WHERE email = '$email' AND status='pending' ");
	$requestrows = mysqli_num_rows($getrequests);
	while($requestdata = mysqli_fetch_assoc($getrequests)){
		$firstname = $requestdata['senderfname'];
		$lastname = $requestdata['senderlname'];
		$email = $requestdata['email'];
	}
	if($requestrows == 0){
		//inform user of no friend requests
		$firstname = $lastname = false;
		$norequests = "<font color='red'>You have no friend requests</font>";
	}else{
		if(!$norequests){
			$firstname = $firstname;
			$lastname = $lastname;
		}
	}
	if(isset($_POST['friendaccept'])){
		//update query content
		$updaterequest = mysqli_query($conn,"UPDATE friends SET status='friend' WHERE email='$email'");
		$request = "<font color='green'>You have accepted the friend request</font>";
	}else{
	if(isset($_POST['frienddelete'])){
		//delete request from database
		$deleterquest = mysqli_query($conn,"DELETE FROM friends WHERE email = '$email'");
		$request = "<font color='red'>Request has been deleted</font>";
	}
}
}



?>