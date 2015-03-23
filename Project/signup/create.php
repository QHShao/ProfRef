<?php
	include '../include/connection.php';
	$uname = $_POST('username');
	$email = $_POST('useremail');
	$password = $_POST('password');

	if($_POST('submit')){
		mysql_query = "INSERT INTO User(`UIUCEmail`, `Name`, `password`, `Admin`)
						VALUES('$email', '$uname', '$password', 0) "or die(mysql_error());//if admin use 1
	}
	echo "You have registered successfully!"
?>