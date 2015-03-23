<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$db = 'Account';

	$connection = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($db);
?>