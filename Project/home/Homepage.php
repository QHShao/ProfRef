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
