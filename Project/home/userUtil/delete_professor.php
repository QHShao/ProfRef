<?php
	session_start();
	$_SESSION['profnames'] = $_POST['profnames'];//store the professor name into global var
	//echo $_SESSION['profnames'];
?>
<html>
	<head>
		<title>Delete professor</title>
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

	<section class="rateform cf">
		<form name="login" action="deletep.php" method="post" accept-charset="utf-8">
			<ul>Delete this Professor?
				<li>
					<input type="submit" name="submit" value="Yes">
				</li>
			</ul>
		</form>
		<form name="signup" action="../AdminHome.php" accept-charset="utf-8">
			<ul>
				<li>
				<input type="submit" value="No ">
				</li>
			</ul>
		</form>
	</section>
</html>