<?php
	$f = $_POST['feeling'];
	$lat = $_POST['latitude'];
	$lng = $_POST['longitude'];
	$con=mysqli_connect("localhost","root","","VSpace");
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	if(mysqli_query($con,"INSERT INTO points (feeling, latitude, longitude) VALUES ('$f', '$lat', '$lng')"))
	{
		printf("Punto registrado!");
	}
	else{
		printf("Error");
	}
	mysqli_close($con);
?>