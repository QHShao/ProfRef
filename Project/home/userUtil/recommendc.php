 

	<?php
		include '../../include/connectPRdata.php';

		session_start();	
        $classRating1Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question1) as avgrating1 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");
        $classRating2Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question2) as avgrating2 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");
        $classRating3Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question3) as avgrating3 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");//sudo query
        $classRating4Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question4) as avgrating4 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");
        $classRating5Query = mysql_query("SELECT Course.Name,AVG(Evaluation.Question5) as avgrating5 FROM Course INNER JOIN Evaluation ON Course.CRN=Evaluation.CRN GROUP BY Evaluation.CRN");

       // $classrequiredQuery = mysql_query("SELECT Name,majorRequire FROM Course");    
       // $majorRequire = mysqli_query($link, "SELECT classname FROM Major, MajorRequirements,Students, Classes WHERE Students.username = '$_SESSION[username]' and Students.MajorID = Major.id and MajorRequirements.MajorID = Students.MajorID and MajorRequirements.ClassID = Classes.id and Classes.id not in (Select ClassId from ClassTaken, Students where Students.username = '$_SESSION[username]' and ClassTaken.StudentID = Students.id) ");
        
	$classScores = []; 
	if($classRating1Query){
			
		while($row = mysql_fetch_assoc($classRating1Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += ($row['avgrating1']);
			} else {
				$classScores[$row['Name']] = ($row['avgrating1']);
			}
		}
	}

	if($classRating2Query){
			
		while($row = mysql_fetch_assoc($classRating2Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += ($row['avgrating2']);
			} else {
				$classScores[$row['Name']] = ($row['avgrating2']);
			}
		}
	}
		if($classRating3Query){
			
		while($row = mysql_fetch_assoc($classRating3Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += ($row['avgrating3']);
			} else {
				$classScores[$row['Name']] = ($row['avgrating3']);
			}
		}
	}
		if($classRating4Query){
			
		while($row = mysql_fetch_assoc($classRating4Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += ($row['avgrating4']);
			} else {
				$classScores[$row['Name']] = ($row['avgrating4']);
			}
		}
	}
		if($classRating5Query){
			
		while($row = mysql_fetch_assoc($classRating5Query)){
			if(isset($classScores[$row['Name']])){
				$classScores[$row['Name']] += ($row['avgrating5']);
			} else {
				$classScores[$row['Name']] = ($row['avgrating5']);
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
		echo '<td>'.$Name.'</td><td style="text-align:center;">'.$classScores[$Name].'</td>';
		echo '</tr>';
	}
	echo '</table>';

      
	?>