<?php
	include '../../include/connectPRdata.php';
	session_start();
	/*$result get information from the query function, in which are all the professors' last name and then 
	we store this information as the array $makes*/

	$crnname = $_SESSION['crnname'];//this is the last name and first name of the professor we want to rate
	$parsedname = explode(" ", $crnname);
	$crn = $parsedname[0];
	$name = $parsedname[1];
	
	mysql_query("DELETE FROM Course WHERE CRN = '$crn'") or die(mysql_error());	
	mysql_query("DELETE FROM Evaluation WHERE CRN = '$crn'") or die(mysql_error());

	echo "<h3 align='center'>Course Evaluation Deleted</h3>";
	header('Refresh: 1; /home/AdminHome.php');
	
?>