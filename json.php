<?php
	$con=mysqli_connect("localhost","root","","VSpace");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	if($result = mysqli_query($con,"SELECT * FROM points;"))
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$array[] = array("feeling" => $row["feeling"], "latitude" => $row["latitude"], "longitude" => $row["longitude"]);
		}
		printf(json_encode(array("points" => $array)));
	}
	else{
		printf("Error");
	}
	mysqli_close($con);
?>