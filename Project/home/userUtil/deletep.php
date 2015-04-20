<?php
	include '../../include/connectPRdata.php';
	session_start();
	/*$result get information from the query function, in which are all the professors' last name and then 
	we store this information as the array $makes*/
	
	$lastfirst = $_SESSION['profnames'];//this is the last name and first name of the professor we want to rate
	$parsedname = explode(", ", $lastfirst);
	$last = $parsedname[0];
	$first = $parsedname[1];
	//echo $parsedname[1];
	$gettingemail = mysql_query("SELECT illinoisEmail FROM Professor WHERE LastName='$last' AND FirstName='$first'");
	$gotemail = mysql_fetch_assoc($gettingemail);
	$email = implode($gotemail);
	//delete review
	mysql_query("DELETE FROM Professor WHERE illinoisEmail='$email'");
	mysql_query("DELETE FROM Review WHERE illinoisEmail='$email'");

	echo "<h3 align='center'>Professor Review Deleted</h3>";
	header('Refresh: 1; /home/AdminHome.php');
?>