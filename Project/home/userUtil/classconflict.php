<?php
		include '../../include/connectPRdata.php';
		session_start();


		$user = $_SESSION['myusername'];
		 $classrequiredQuery = mysql_query("SELECT Name,MajorRequired FROM Course");    
    	$classtakenQuery = mysql_query("SELECT CourseName From CoursesTaken WHERE UIUCEmail='$user'");
    	
    	$checkarray = array();
    	
    	while($row = mysql_fetch_array($classtakenQuery)){
 			$checkarray[] = $row['CourseName'];
 			//echo $checkarray;
		}

		$email = $_SESSION['myusername'];
		$q = "SELECT CourseName FROM CoursesTaken WHERE UIUCEmail = '$email'";
		echo 'Courses you have taken: ';
		echo '<br>';
		$result = mysql_query($q);
		while($row = mysql_fetch_assoc($result)){
			echo $row['CourseName'];
			echo '<br>';
		}

		echo 'Please choose a course:';
	$query = "SELECT Course.Name, SectionInfo.StartTime, SectionInfo.EndTime from Course INNER JOIN SectionInfo WHERE Course.CRN = SectionInfo.CRN";
	$result = mysql_query($query);
	echo '<form action="#" method="post">';
	while($row = mysql_fetch_assoc($result)){
		if(in_array($row['Name'], $checkarray)){
				//echo 'aaaaaaaaaaaaaaaaaaaaaa';
			} 
		else echo '<input type="checkbox" name="checklist[]" value="'.$row['Name'].'">'.$row['Name'].'<br>';
		
	}
	echo '<input type="submit" name="submit" value="select">';
	echo '</form>';
	//
	//
	//echo '<input type="checkbox" name="check_list[]" value="Java"><label>Java</label><br>';
	//echo '<input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label><br>';
	//
	//;
	$globalcourse;
	$flag = 0;
	foreach($_POST['checklist'] as $course1){
		
		foreach($_POST['checklist'] as $course2){
			if($course1 != $course2){
				$query1 = "SELECT StartTime from SectionInfo INNER JOIN Course ON Course.CRN = SectionInfo.CRN WHERE Course.name = '$course1'";
				$query2 = "SELECT EndTime from SectionInfo INNER JOIN Course ON Course.CRN = SectionInfo.CRN WHERE Course.name = '$course1'";
				$starttime = mysql_query($query1);
				$endtime = mysql_query($query2);
				$startval = mysql_fetch_assoc($starttime);
				$endval = mysql_fetch_assoc($endtime);
				$v1 = $startval['StartTime'];
				$v2 = $endval['EndTime'];

				$query11 = "SELECT StartTime from SectionInfo INNER JOIN Course ON Course.CRN = SectionInfo.CRN WHERE Course.name = '$course2'";
				$query21 = "SELECT EndTime from SectionInfo INNER JOIN Course ON Course.CRN = SectionInfo.CRN WHERE Course.name = '$course2'";
				$starttime1 = mysql_query($query11);
				$endtime1 = mysql_query($query21);
				$startval1 = mysql_fetch_assoc($starttime1);
				$endval1 = mysql_fetch_assoc($endtime1);
				$v11 = $startval1['StartTime'];
				$v21 = $endval1['EndTime'];

				//$queryhahah = "SELECT SectionInfo.CRN from SectionInfo INNER JOIN Course ON Course.CRN = SectionInfo.CRN WHERE Course.Name = '$course2' AND ($v21 > $v1 AND $v11 < $v1)";
				//$query = "SELECT Course.Name, SectionInfo.StartTime, SectionInfo.EndTime from Course INNER JOIN SectionInfo WHERE Course.CRN = SectionInfo.CRN";
				if($v21 > $v1 && $v11 < $v1){
					if($globalcourse != $course2){

						echo $course1.' conflicts with '.$course2;
						echo '<br>';
						$flag = 1;
					}
					$globalcourse = $course1;
				}
			}
		}
	}

	if($flag == 0){
		foreach($_POST['checklist'] as $course1){
			echo $course1;
			echo '<br>';
		}

	}	
	

	/*if(isset($_POST['submit'])){//to run PHP script on submit
		if(!empty($_POST['checklist'])){
		// Loop to store and display values of individual checked checkbox.
			foreach($_POST['checklist'] as $selected){
				echo $selected."</br>";
			}
		}
	}*/
?>

<html>
	<div>
			<a href="../Homepage.php" class="pos_fixed">&lt&ltBack</a>
	</div>
	</html>