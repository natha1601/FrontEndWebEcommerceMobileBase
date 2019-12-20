<?php  
	$database = mysqli_connect("localhost", "root", "", "sepulsa");

	if (!$database) {
		die("not connected" . mysqli_connect_error());
	}
?>