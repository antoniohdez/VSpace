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
		if($this->conexion->query("INSERT INTO points (feeling, latitude, longitude, message) VALUES ('$feeling', '$lat', '$lng', '$msg')"))
		{
			return "success";
		}
		else{
			return "error";
		}
	}
	
}
?>