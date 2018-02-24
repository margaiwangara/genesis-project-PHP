<?php

require('dbconnect.php');
	//check if logged in
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_SESSION['SESS_EMAIL']) && ($_SESSION['SESS_FIRSTNAME']) && ($_SESSION['SESS_LASTNAME'])){
		//declare variables
		$error = false;
		$post = $_POST['post'];
		$privacy = $_POST['postprivacy'];
		$email = $_SESSION['SESS_EMAIL'];
		$firstname = $_SESSION['SESS_FIRSTNAME'];
		$lastname = $_SESSION['SESS_LASTNAME'];
		$privacylower = strtolower($privacy);
		$postslower = strtolower($post);
	
	if(empty($_POST['post']) || (empty('privacy'))){
		$error = "You cannot post nothing";
		}else{
		if(!$error){
	
		$query = "INSERT INTO posts(useremail,post,privacy) VALUES('$email','$postslower','$privacylower')";
		$result = mysqli_query($conn,$query);
	if(!$result){
		echo "DB Failed. No values inserted";
	}else{
		$getpublicposts = mysqli_query($conn,"SELECT * FROM posts WHERE privacy = 'everyone'");
		$getfriendsposts = mysqli_query($conn,"SELECT * FROM posts WHERE privacy = 'friends'");
		$getfamilyposts = mysqli_query($conn,"SELECT * FROM posts WHERE privacy = 'family'");
		$getprivateposts = mysqli_query($conn,"SELECT * FROM posts WHERE privacy = 'private'");
		$getfriendsoffriendsposts = mysqli_query($conn,"SELECT * FROM posts WHERE privacy = 'friendsoffriends'");
		
		//check rows returned
		$publicrows = mysqli_num_rows($getpublicposts);
		
		//public posts
		if(!$getpublicposts){
			echo "No results obtained";
		}else{
			while($publicposts = mysqli_fetch_assoc($getpublicposts)){
			$everyonepost = $publicposts['post'];
			$allposters = $publicposts['useremail'];
		}
		}
		//friends posts
		if(!$getfriendsposts){
			echo "No results obtained";
		}else{
			while($friendsposts = mysqli_fetch_assoc($getfriendsposts)){
			$friendspost = $friendsposts['post']; 
		}
		}
		//family posts
		if(!$getfamilyposts){
			echo "No results obtained";
		}else{
			while($familyposts = mysqli_fetch_assoc($getfamilyposts)){
			$familypost = $familyposts['post']; 
		}
		}
		//private posts
		if(!$getprivateposts){
			echo "No results obtained";
		}else{
			while($privateposts = mysqli_fetch_assoc($getprivateposts)){
			$privatepost = $privateposts['post']; 
		}
		}
		//friendsoffriends posts
		if(!$getfriendsoffriendsposts){
			echo "No results obtained";
		}else{
			while($friendsoffriendsposts = mysqli_fetch_assoc($getfriendsoffriendsposts)){
			$fofpost = $friendsoffriendsposts['post']; 
		}
		}
		if($everyonepost){
		$homepost = $everyonepost;
		//open files
		$handleveryone = fopen("logs/posts/everyone.html","a");
		//current date/date of post
		$date = "Posted on:".date('D ') .date("h:i:s a");
		//write to file
		fwrite($handleveryone,"<table><tr><th><div class='poster'>" .strtolower($_SESSION['SESS_FIRSTNAME']). "&nbsp" .strtolower($_SESSION['SESS_LASTNAME'])."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$homepost. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
		//close files
		fclose($handleveryone);
			
		}else{
			
		if($friendspost){
		$homepost = $friendspost;
		//open files
		$handleveryone = fopen("logs/posts/friend.html","a");
		//current date/date of post
		$date = "Posted on:".date('D ') .date("h:i:s a");
		//write to file
		fwrite($handleveryone,"<table><tr><th><div class='poster'>" .strtolower($_SESSION['SESS_FIRSTNAME']). "&nbsp" .strtolower($_SESSION['SESS_LASTNAME'])."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$homepost. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
		//close files
		fclose($handleveryone);
			
		}else{
			
			if($familypost){
		$homepost = $familypost;
		//open files
		$handleveryone = fopen("logs/posts/family.html","a");
		//current date/date of post
		$date = "Posted on:".date('D ') .date("h:i:s a");
		//write to file
		fwrite($handleveryone,"<table><tr><th><div class='poster'>" .strtolower($_SESSION['SESS_FIRSTNAME']). "&nbsp" .strtolower($_SESSION['SESS_LASTNAME'])."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$homepost. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
		//close files
		fclose($handleveryone);
			
		}else{
			
			if($privatepost){
		$homepost = $privatepost;
		//open files
		$handleveryone = fopen("logs/posts/private.html","a");
		//current date/date of post
		$date = "Posted on:".date('D ') .date("h:i:s a");
		//write to file
		fwrite($handleveryone,"<table><tr><th><div class='poster'>" .strtolower($_SESSION['SESS_FIRSTNAME']). "&nbsp" .strtolower($_SESSION['SESS_LASTNAME'])."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$homepost. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
		//close files
		fclose($handleveryone);
			
		}else{
			
			if($fofpost){
		$homepost = $fofpost;
		//open files
		$handleveryone = fopen("logs/posts/friendsoffriends.html","a");
		//current date/date of post
		$date = "Posted on:".date('D ') .date("h:i:s a");
		//write to file
		fwrite($handleveryone,"<table><tr><th><div class='poster'>" .strtolower($_SESSION['SESS_FIRSTNAME']). "&nbsp" .strtolower($_SESSION['SESS_LASTNAME'])."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$homepost. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
		//close files
		fclose($handleveryone);
			
		}
		}
		}
		}
		}
		
		
		
											
		}
			
			}
		}
	}
	}
	
?>