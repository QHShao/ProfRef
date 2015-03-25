<?php
	include '../../include/connectPRdata.php';
	
		
	$result = mysql_query("SELECT LastName FROM Professor") or die(mysql_error());
	//$value = mysql_fetch_assoc($result);
	//$check = $value["LastName"];
	//echo $check;

	$makes = array();
	//echo "<html>"
	//echo "<select>"	
	while ($row = mysql_fetch_array($result)) {
   		array_push($makes, $row["LastName"]);
   		//echo "<option>" . $row{'Professor'} . "</option>";
	}
	//echo json_encode($makes);
	

 
	echo '<select name="names">';
	 
	foreach($makes as $name){
		echo '<option value="' . $name . '">' . $name . '</option>';
	}
	echo'</select>';
?>

