<html>
	<body>
		Login Successful
	</body>
</html>

<?php
	include '../include/connection.php';
	session_start();
	$id = $_SESSION['myusername'];
	//echo $id;
	$sql = "SELECT Admin FROM User WHERE UIUCEmail='$id'";
	//check if the user is admin or not
	$admin = mysql_fetch_assoc( mysql_query($sql) );
	$check = $admin["Admin"];
	echo $check;
	//if admin direct to admin home
	if($check == 1){
		header('Location:/home/AdminHome.php');
	}
	//else normal user page
	else{
		header('location:/home/Homepage.php');
	}
?>

