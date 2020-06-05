<?php 
	session_start();
	$_SESSION=array();
	session_destroy();	
	//DESTROY COOKIE IF SET
	if (isset($_COOKIE["remember_me"])){
		setcookie("remember_me","",time()-60);
	}
	header("Location:../login.php");
 ?>