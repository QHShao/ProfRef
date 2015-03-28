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
	//echo $email;

	$q1 = $_POST['Question1'];
	$q2 = $_POST['Question2'];
	$q3 = $_POST['Question3'];
	$q4 = $_POST['Question4'];
	$q5 = $_POST['Question5'];
	$submit = $_POST['submit'];
	//echo $profname;
	/*echo $q1;
	echo $q2;
	echo $q3;
	echo $q4;
	echo $q5;*/
	//echo $submit;
	$getcount = mysql_query("SELECT COUNT(*) FROM Review");
	$count = implode(mysql_fetch_assoc($getcount));
	//echo $count;
	if($submit){
		mysql_query("INSERT INTO Review(`ReviewID`, `illinoisEmail`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`) VALUES('$count', '$email', '$q1', '$q2', '$q3', '$q4', '$q5')") or die(mysql_error());//if admin use 1
		echo "<h3 align='center'>Professor Review Added</h3>";
		header('Refresh: 1; /home/userUtil/get_rate_Professor.php');
	}
?>