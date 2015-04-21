 

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
	
		$user = $_SESSION['myusername'];
        $classRating1Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question1) as avgrating1 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");
        $classRating2Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question2) as avgrating2 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");
        $classRating3Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question3) as avgrating3 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");//sudo query
        $classRating4Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question4) as avgrating4 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");
        $classRating5Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question5) as avgrating5 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");

        $classrequiredQuery = mysql_query("SELECT Name,MajorRequired FROM Course");    
    	$classtakenQuery = mysql_query("SELECT CourseName From CoursesTaken WHERE UIUCEmail='$user'");
    	
    	$checkarray = array();
    	
    	while($row = mysql_fetch_array($classtakenQuery)){
 			$checkarray[] = $row['CourseName'];
 			//echo $checkarray;
		}
	$classScores = []; 
	
	$a = 0.2;
	$b = 0.2;
	$c = 0.2;
	$d = 0.2;
	$e = 0.2;

	if($_POST['coursehehe']==1){
		$a = 0.6;
		$b = 0.1;
		$c = 0.1;
		$d = 0.1;
		$e = 0.1;
	}
	
	if($_POST['coursehehe']==2){
		$b = 0.6;
		$a = 0.1;
		$c = 0.1;
		$d = 0.1;
		$e = 0.1;
	}
	if($_POST['coursehehe']==3){
		$c = 0.6;
		$b = 0.1;
		$a = 0.1;
		$d = 0.1;
		$e = 0.1;
	}
	if($_POST['coursehehe']==4){
		$d = 0.6;
		$b = 0.1;
		$c = 0.1;
		$a = 0.1;
		$e = 0.1;
	}
	if($_POST['coursehehe']==5){
		$e = 0.6;
		$b = 0.1;
		$c = 0.1;
		$d = 0.1;
		$a = 0.1;
	}	

	if($classRating1Query){
			
		while($row = mysql_fetch_assoc($classRating1Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += $a*($row['avgrating1'])/5*100;
			} else {
				$classScores[$row['Name']] = $a*($row['avgrating1'])/5*100;
			}
		}
	}

	if($classRating2Query){
			
		while($row = mysql_fetch_assoc($classRating2Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += $b*($row['avgrating2'])/5*100;
			} else {
				$classScores[$row['Name']] = $b*($row['avgrating2'])/5*100;
			}
		}
	}
		if($classRating3Query){
			
		while($row = mysql_fetch_assoc($classRating3Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += $c*($row['avgrating3'])/5*100;
			} else {
				$classScores[$row['Name']] = $c*($row['avgrating3'])/5*100;
			}
		}
	}
		if($classRating4Query){
			
		while($row = mysql_fetch_assoc($classRating4Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += $d*($row['avgrating4'])/5*100;
			} else {
				$classScores[$row['Name']] = $d*($row['avgrating4'])/5*100;
			}
		}
	}
		if($classRating5Query){
			
		while($row = mysql_fetch_assoc($classRating5Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += $e*($row['avgrating5'])/5*100;
			} else {
				$classScores[$row['Name']] = $e*($row['avgrating5'])/5*100;
			}
		}
	}
	$dick = [];
	if($classrequiredQuery){
				
			while($row = mysql_fetch_assoc($classrequiredQuery)){
				$dick[$row['Name']] = $row['MajorRequired'];
				if(isset($classScores[$row['Name']])){
					if($row['MajorRequired']==1)
						$classScores[$row['Name']] += 0;
				} 
				else {
				  		$classScores[$row['Name']] = 0;
				}
			}
		}
	
	echo '<br>';
	echo '<table class="center" style="border-collapse:collapse;">';
	echo '<tr>';
        echo '<th>Recommended Classes</th><th>Score</th>';
        echo '</tr><br>' ;
        arsort($classScores);
	foreach ($classScores as $Name => $score){
		
		echo '<tr>';
		if($dick[$Name] == 1){
			//echo $checkarray;
			if(in_array($Name, $checkarray)){
				//echo 'aaaaaaaaaaaaaaaaaaaaaa';
			} 
			else echo '<td>'.$Name.'</td><td style="text-align:center;">'.'<font color =red>'.$classScores[$Name].'</font>'.'</td>';
		}
		else{
			//echo $Name;
			if(in_array($Name, $checkarray)){

			} 
			else echo '<td>'.$Name.'</td><td style="text-align:center;">'.$classScores[$Name].'</td>';	
		}
		echo '</tr>';
	}
	echo '</table>';

      
	?>
	<html>
	<div>
			<a href="../Homepage.php" class="pos_fixed">&lt&ltBack</a>
	</div>
	</html>