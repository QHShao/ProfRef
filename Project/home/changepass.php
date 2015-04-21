<html>
	<head>
		<title>Rate your course</title>
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="style.css">
		<link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
		<link rel="manifest" href="/icon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/icon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	</head>
	<section class="addform cf">
		<form name="login" action="changepass.php" method="post" accept-charset="utf-8">
			<ul>
				<li>
					<label for="Question1">Enter Old Password</label>
					<input type="password" name="pass1" placeholder="Old Password" required>
				</li>
				<li>
					<label for="Question2">Enter New Passward</label>
					<input type="password" name="pass2" placeholder="New Passward" required>
				</li>
				<li>
					<label for="Question2">New Passward Again</label>
					<input type="password" name="pass3" placeholder="New Passward Again" required>
				</li>
				<li>
					<input type="submit" name="submit" value="Submit">
				</li>
			</ul>
		</form>
	</section>
	<div>
			<a href="Homepage.php" class="pos_fixed">&lt&ltBack</a>
	</div>
</html>

<?php
	include '../include/connection.php';
	session_start();
	$newpass = $_POST['pass2'];
	$email = $_SESSION['myusername'];
	$query = "UPDATE User SET password = '$newpass' WHERE UIUCEmail = '$email'";
	mysql_query($query);


		//echo "Passward updated successfully!!!";
	
?>