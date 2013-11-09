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

	function addTag($feeling, $lat, $lng, $msg){
		return $query = mysql_query("INSERT INTO points (feeling, latitude, longitude, message) VALUES ('$feeling', '$lat', '$lng', '$msg')");
	}
	
}
?>