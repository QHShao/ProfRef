<?php
include '../../include/connectPRdata.php';
	session_start();
	$email = $_SESSION['myusername'];
	$q = "SELECT CourseName FROM CoursesTaken WHERE UIUCEmail = '$email'";
	echo 'Courses you have taken: ';
	echo '<br>';
	$result = mysql_query($q);
	while($row = mysql_fetch_assoc($result)){
		echo $row['CourseName'];
		echo '<br>';
	}
	
	//echo $email;	
	$query = "SELECT Course.Name, SectionInfo.StartTime, SectionInfo.EndTime from Course INNER JOIN SectionInfo WHERE Course.CRN = SectionInfo.CRN AND SectionInfo.CRN NOT IN (SELECT CRN FROM CoursesTaken WHERE UIUCEmail = '$email')";

	$result = mysql_query($query);
	echo '<form action="#" method="post">';
	while($row = mysql_fetch_assoc($result)){
		echo '<input type="checkbox" name="checklist[]" value="'.$row['Name'].'">'.$row['Name'].'<br>';
		
	}
	echo '<input type="submit" name="submit" value="select">';
	echo '</form>';

	foreach($_POST['checklist'] as $course1){
		$prequery = "SELECT CRN FROM Course WHERE Name = '$course1'";
		$crnnum = mysql_fetch_assoc((mysql_query($prequery)));
		$c = $crnnum['CRN'];
		$prequerysdad = "SELECT ID FROM CoursesTaken WHERE UIUCEmail = '$email' AND CRN = '$c'"; 
		$crnnumsdad = mysql_fetch_assoc((mysql_query($prequerysdad)));
		$idd = $crnnumsdad['ID'];
		if(!$idd){
			$query = "INSERT INTO CoursesTaken (`UIUCEmail`, `CourseName`, `CRN`) VALUES ('$email', '$course1', '$c')";
			mysql_query($query);
			header('Refresh:0');
		}
	}
	

?>
<html>
	<div>
			<a href="../Homepage.php" class="pos_fixed">&lt&ltBack</a>
	</div>
	</html>