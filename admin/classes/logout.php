<?php
include('auth.php');
	session_start();
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	session_destroy();
	header('Location:../index.php?action=logout');
?>
