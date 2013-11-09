<?php
	$con=mysqli_connect("localhost","root","","VSpace");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	if($result = mysqli_query($con,"SELECT * FROM gifts;"))
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$query = mysqli_query($con,"SELECT name FROM users where user_id=".$row["user_id"].";");
			$user = mysqli_fetch_array($query);
			$array[] = array("id" => $row["id"], "user" => $user["name"], "gift" => $row["gift"], "message" => $row["message"], "tag" => $row["point_id"]);
		}
		printf(json_encode(array("dataArray" => $array)));
	}
	else{
		printf("Error");
	}
	mysqli_close($con);
?>