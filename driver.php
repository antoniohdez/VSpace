<?php	
	
class dbDriver{
	private $conexion;
	
	function __construct(){
		$this->conexion=mysqli_connect("localhost","root","","VSpace") or die("Error " . mysqli_error($this->conexion));
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
		$array = array(
			"id" => $row['id'],
			"feeling" => $row['feeling'],
			"latitude" => $row['latitude'],
			"longitude" => $row['longitude'],
			"message" => $row['message'],
			"user_id" => $row['user_id'],
			"user_name" => $row_user['name'],
		);
		return $array;
	}

	function login($user, $password, $id){
		//$password = md5($password);
		$query = mysqli_query($this->conexion, "SELECT * from users where email='$user'");			
		$row = mysqli_fetch_array($query);
		if($row['password'] == $password){
			$_SESSION["name"] = $row["name"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["user_id"] = $row["user_id"];
			if(intval($id) > 0){
				header('Location: gift.php?id='.intval($id));
				exit();
			} else {
				header('Location: index.php');
				exit();
			}
		} else {
			header('Location: login.php?err=1');
			exit();
		}
	}

	function addAccount($user, $email, $password){
		mysqli_query($this->conexion, "INSERT INTO users (name, email, password) VALUES ('$user', '$email', '$password')");
	}

}
?>