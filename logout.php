<?php
	session_start();

	$_SESSION['nohp'] = '';
	session_destroy();
	header("location:login.php");
 ?>