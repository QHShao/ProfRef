<?php
	session_start();
	$_SESSION['crnname'] = $_POST['crnname'];
	//echo $_SESSION['crnname'];
?>

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
	<section class="rateform cf">
		<form name="login" action="rateCourse.php" method="post" accept-charset="utf-8">
			<ul>
				<li>
					<label for="Question1">effectiveness</label>
					<input type="number" name="Question1" min="1" max="5" placeholder="from 1 to 5" required>
				</li>
				<li>
					<label for="Question2">Helpfulness</label>
					<input type="number" name="Question2" min="1" max="5" placeholder="from 1 to 5" required>
				</li>
				<li>
					<label for="Question3">Easiness</label>
					<input type="number" name="Question3" min="1" max="5" placeholder="from 1 to 5" required>
				</li>
				<li>
					<label for="Question4">resource</label>
					<input type="number" name="Question4" min="1" max="5" placeholder="from 1 to 5" required>
				</li>
				<li>
					<label for="Question5">fun</label>
					<input type="number" name="Question5" min="1" max="5" placeholder="from 1 to 5" required>
				</li>
				<li>
					<input type="submit" name="submit" value="Submit">
				</li>
			</ul>
		</form>
	</section>
	<div>
			<a href="../Homepage.php" class="pos_fixed">&lt&ltBack</a>
	</div>
</html>
