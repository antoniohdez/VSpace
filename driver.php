<?php	
	
class dbDriver{
	private $conexion;
	
	function __construct(){
	    $this->conexion = mysql_connect("localhost", "root", "") or die("Error while connecting the database");
		mysql_select_db("vspace");
		session_start();
	}
	
	function __destruct(){
		mysql_close($this->conexion);
	}

	function addTag($feeling, $lat, $lng, $msg, $user){
		return $query = mysql_query("INSERT INTO points (feeling, latitude, longitude, message, user_id) VALUES ('$feeling', '$lat', '$lng', '$msg', '$user')");
	}
	
	function addGift($gift, $msg, $user){
		return $query = mysql_query("INSERT INTO gifts (gift, message, user_id) VALUES ('$gift', '$msg', '$user')");
	}

	function getTag($id){
		$query = mysql_query("SELECT * FROM points WHERE id='$id'");
		$row=mysql_fetch_array($query);
		$query_user = mysql_query("SELECT name FROM users NATURAL JOIN points WHERE points.id='$id'");
		$row_user=mysql_fetch_array($query_user);
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