<?php 
session_start(); //to ensure you are using same session
if(isset($_SESSION['login_user'])){
	session_unset();
	session_destroy();
	$_SESSION['login_user']=NULL;
	$_SESSION['usertype'] = NULL;
}
header("location: ../index.php");//to redirect back to "index.php" after logging out
exit();
?>
