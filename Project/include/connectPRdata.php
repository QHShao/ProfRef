<?php
	//connection for admin user and normal user
	$dbhost = 'localhost';
	$dbuser = 'CS411';
	$dbpass = 'q1w2e3';
	$db_name = 'ProfRef';
	//$tbl_name = 'Course';

	$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	mysql_select_db($db_name) or die(mysql_error());
?>