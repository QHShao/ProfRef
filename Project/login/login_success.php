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
	$admin = mysql_fetch_assoc( mysql_query($sql) );
	$check = $admin["Admin"];
	echo $check;
	if($check == 1){
		header('Location:/home/AdminHome.html');
	}
	else{
		header('location:/home/userUtil/getProfessor.php');
	}
?>

