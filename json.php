<?php
	$con=mysqli_connect("localhost","root","","VSpace");
	//$con=mysqli_connect("localhost","fondeand","Parasito#666","fondeand_vspace");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	if($result = mysqli_query($con,"SELECT * FROM points;"))
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$array[] = array("id" => $row["id"], "latitude" => $row["latitude"], "longitude" => $row["longitude"], "feeling" => $row["feeling"], "message" => $row["message"]);
		}
		printf(json_encode(array("dataArray" => $array)));
	}
	else{
		printf("Error");
	}
	mysqli_close($con);
?>