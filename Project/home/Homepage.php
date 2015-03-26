<html>
	<head>
		<title>Home</title>
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

	<div>
		<h1>Home</h1>
	</div>

	<body>
		<section class="addform cf">
			<ul>				
				<li>	
					<?php
						include '../include/connectPRdata.php';
						
						/*$result get information from the query function, in which are all the professors' last name and then 
						we store this information as the array $makes*/
						$result = mysql_query("SELECT LastName FROM Professor") or die(mysql_error());
						$makes = array();
						while ($row = mysql_fetch_array($result)) {
					   		array_push($makes, $row["LastName"]);
						}
						
					 	/*make the drop list using html*/
						echo '<select name="names">';
						 
						foreach($makes as $name){
							echo '<option value="' . $name . '">' . $name . '</option>';
						}
						echo'</select>';
					?>
				</li>
			</ul>
		</section>
		<div>
			<a href="/logout/logout.php" class="pos_fixed">Log out</a>
		</div>
	</body>
</html>


