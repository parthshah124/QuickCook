<?php
SESSION_START();
if(empty($_SESSION['uname'])){
	header('Location: login.php');
}
else{
	unset($_SESSION['uname']); // this will be done in logout feature means logout button
	session_destroy();         // when user logs out 
	header('Location: index.php');
}

?>