<?php	
	
class dbDriver{
	private $conexion;
	
	function __construct(){
		$this->conexion=mysqli_connect("localhost","root","","VSpace") or die("Error " . mysqli_error($this->conexion));
	    //$this->conexion = mysql_connect("localhost", "root", "") or die("Error while connecting the database");
		//mysql_select_db("VSpace");
		session_start();
	}
	
	function __destruct(){
		mysqli_close($this->conexion);
	}

	function addTag($feeling, $lat, $lng, $msg, $user){
		if(mysqli_query($this->conexion, "INSERT INTO points (feeling, latitude, longitude, message) VALUES ('$feeling', '$lat', '$lng', '$msg')"))
		{
			return "success";
		}
		else{
			return "error";
		}
	}
	
	function addGift($gift, $msg, $user){
		return $query = mysqli_query($this->conexion, "INSERT INTO gifts (gift, message, user_id) VALUES ('$gift', '$msg', '$user')");
	}

	function getTag($id){
		$query = mysqli_query($this->conexion, "SELECT * FROM points WHERE id='$id'");
		$row=mysqli_fetch_array($query);
		$query_user = mysqli_query($this->conexion, "SELECT name FROM users NATURAL JOIN points WHERE points.id='$id'");
		$row_user=mysqli_fetch_array($query_user);
		$array = [
			"id" => $row['id'],
			"feeling" => $row['feeling'],
			"latitude" => $row['latitude'],
			"longitude" => $row['longitude'],
			"message" => $row['message'],
			"user_id" => $row['user_id'],
			"user_name" => $row_user['name'],
		];
		return $array;
	}

}
?>