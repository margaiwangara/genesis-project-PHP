<?php

require('dbconnect.php');
	
	//check if logged in
	if (isset($_POST['post'])) {
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
		echo "DB Failed. No values inserted due to" .mysql_error();
		}else{
		$getposts = mysqli_query($conn,"SELECT * FROM posts ");
		if(!$getposts){
			echo "Error in getting files";
		}
		//check rows returned
		$publicrows = mysqli_num_rows($getposts);
		if(!$publicrows){
			echo "Error in getting files";
		}
		while($allposts = mysqli_fetch_assoc($getposts)){
		//declare variables
		$myprivacy = $allposts['privacy'];
		$myposts = $allposts['post'];
		}
		
		$firstname = strtolower($_SESSION['SESS_FIRSTNAME']);
		$lastname = strtolower($_SESSION['SESS_LASTNAME']);
		//current date/date of post
		$date = "Posted on:".date('D ') .date("h:i:s a");
		
		//getposts from database and insert into file
		//public posts
		if($myprivacy == 'everyone'){
			$publicposts = $myposts;
			$handlepublic = fopen("logs/posts/everyone.html","a");
			$confirm = fwrite($handlepublic,"<table><tr><th><div class='poster'><a href='friendprofile.php'>".ucfirst($firstname). "&nbsp" .ucfirst($lastname)."</a></div></th></tr>" . "<tr><td><div class='postsuser'>" .$publicposts. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
			if($confirm){
				
			}else{
				echo "Post Failed";
			}
			fclose($handlepublic);
		}else{
		//private posts
		if($myprivacy == 'private'){
			$publicposts = $myposts;
			$handlepublic = fopen("logs/posts/private.html","a");
			fwrite($handlepublic,"<table><tr><th><div class='poster'>" .ucfirst($firstname). "&nbsp" .ucfirst($lastname)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$publicposts. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
			fclose($handlepublic);
		}else{
		//family posts
		if($myprivacy == 'family'){
			$publicposts = $myposts;
			$handlepublic = fopen("logs/posts/family.html","a");
			fwrite($handlepublic,"<table><tr><th><div class='poster'>" .ucfirst($firstname). "&nbsp" .ucfirst($lastname)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$publicposts. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
			fclose($handlepublic);
		}else{
		//friends of friends posts
		if($myprivacy == 'friendsoffriends'){
			$publicposts = $myposts;
			$handlepublic = fopen("logs/posts/friendsoffriends.html","a");
			fwrite($handlepublic,"<table><tr><th><div class='poster'>" .ucfirst($firstname). "&nbsp" .ucfirst($lastname)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$publicposts. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
			fclose($handlepublic);
		}else{
		//friends posts
		if($myprivacy == 'friends'){
			$publicposts = $myposts;
			$handlepublic = fopen("logs/posts/friends.html","a");
			$confirm = fwrite($handlepublic,"<table><tr><th><div class='poster'>" .ucfirst($firstname). "&nbsp" .ucfirst($lastname)."</div></th></tr>" . "<tr><td><div class='postsuser'>" .$publicposts. "</div></td></tr>" . "<tr><td><div class='posttime'>" .$date. "</div></td></tr></table>");
			
			
			fclose($handlepublic);
		}else{
			$error = "<font color='red'>Failed to input data into file</font>";
		}
											
		}
			
			}
		}
	}
	}
	}}}}
?>