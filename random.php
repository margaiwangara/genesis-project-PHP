<?php

function generateRandomString(){
	$length = 6;
	$characters = '0123456789abcdeghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string = '';
	
	for($p = 0;$p < $length;$p++){
		$string .= $characters[mt_rand(0,strlen($characters))];
	}
	
	return $string;
}

echo generateRandomString();



?>