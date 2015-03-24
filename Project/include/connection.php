<?php
	$dbhost = 'localhost';
	$dbuser = 'CS411';
	$dbpass = 'q1w2e3';
	$db_name = 'Account';
	$tbl_name = 'User';

	$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die();
	mysql_select_db($db_name) or die();
?>