<html>
	<body>
		Login Successful
	</body>
</html>

<?php
	session_start();
	if(!$_SESSION['myusername']){
		header('location:index.html');
	}
?>

