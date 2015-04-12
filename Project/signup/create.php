<head>
	<title>You have registered successfully!</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
	<link rel="apple-touch-icon" sizes="57x57" href="../icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../icon/favicon-16x16.png">
	<link rel="manifest" href="../icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>



<?php
	include '../include/connection.php';
	$uname = $_POST['username'];
	//echo $uname;
	$email = $_POST['useremail'];
	//echo $email;
	$password = $_POST['password'];
	//echo $password;
	
	$submit = $_POST['Submit'];
	//echo $submit;

	if($submit){
		mysql_query("INSERT INTO User(`UIUCEmail`, `Name`, `password`, `Admin`)
						VALUES('$email', '$uname', '$password', 0)") or die(mysql_error());//if admin use 1
		//TODO:need to handle sign in failure here
		
	}
	//check if admin and then redirect
	if($email == 'superadmin@illinois.edu'){
		mysql_query("UPDATE User SET Admin=1 WHERE UIUCEmail='superadmin@illinois.edu'") or die(mysql_error());
		echo "<h3 align='center'> You are Admin now! You are redirected to your home page now </h3>";
		header('Refresh: 3; /home/AdminHome.html');
	}
	else{
		echo "<h3 align='center'> You have registered successfully! </h3>";
		header('Refresh: 2; /home/Homepage.php');
	}
	
?>