<head>
	<title>Profile Added</title>
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
	include '../include/connectPRdata.php';
	$lname = $_POST['LastName'];
	//echo $uname;
	$fname = $_POST['FirstName'];
	//echo $email;
	$email = $_POST['IllinoisEmail'];
	//echo $password;
	
	$submit = $_POST['Submit'];
	//echo $submit;
	
	

	if($submit){
		mysql_query("INSERT INTO Professor(`LastName`, `FirstName`, `IllinoisEmail`) VALUES('$lname', '$fname', '$email')") or die(mysql_error());//if admin use 1
		echo "<h3 align='center'>Profile Added</h3>";
		header('Refresh: 1; /home/AdminHome.html');
	}
?>