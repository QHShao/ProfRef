
<?php
	include '../include/connection.php';
	session_start();

	// Connect to server and select databse.
	mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	// username and password sent from form
	$myusername = $_POST['useremail'];
	$mypassword = $_POST['password'];

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	$sql = "SELECT * FROM $tbl_name WHERE UIUCEmail='$myusername' AND password='$mypassword'";
	$result = mysql_query($sql);
//echo $result;
	// Mysql_num_row is counting table row
	$count = mysql_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count == 1){
	// Register $myusername, $mypassword and redirect to file "login_success.php"
		$_SESSION['myusername'] = $myusername;
		$_SESSION['password'] = $mypassword;
		//echo $count;
		header('location:login_success.php');
	}
	else {
		header('location:../index.html');
	}
?>