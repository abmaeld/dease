<?php 

	include "conn.php"; 
	
	$sql = "SELECT * FROM occurrences";
	$n1query = $c->query($sql);

	$filestr = ""; // Declare empty string;

	if ($n1query->num_rows > 0) {
	          
		while($row = $n1query->fetch_assoc()) {

		if ($row["Id"] > 1) {

			$filestr .= "		";

		} 

		$filestr .= $row["Id"]. ": {\n\n		  disease : '" . $row["Disease"]. "',\n		  center: { lat: " . $row["Lat"]. ", lng: ". $row["Lng"]. "},\n		  reports: " .$row["Reports"]. ",\n\n        },\n\n";

		}

	}
  
  	echo $filestr;

	$c->close();

?>