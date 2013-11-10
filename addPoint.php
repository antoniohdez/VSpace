<?php
	$f = $_POST['feeling'];
	$lat = $_POST['latitude'];
	$lng = $_POST['longitude'];
	$msg = $_POST['message'];
	$con=mysqli_connect("localhost","root","","VSpace");
	//$con=mysqli_connect("localhost","fondeand","Parasito#666","fondeand_vspace");
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	if(mysqli_query($con,"INSERT INTO points (feeling, latitude, longitude, message) VALUES ('$f', '$lat', '$lng', '$msg')"))
	{
		printf("Punto registrado!");
	}
	else{
		printf("Error");
	}
	mysqli_close($con);
?>