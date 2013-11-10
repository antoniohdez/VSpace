<?php
	require_once("driver.php");

	$driver = new dbDriver();
	if($_POST['password'] === $_POST['password2']){
		if($driver->addAccount($_POST['name'], $_POST['email'], md5($_POST['password'])) == "success"){
			$driver->login($_POST["email"], $_POST["password"], 0);
		}
		else{
			header("Location: signIn.php?error=1");
		}
	}

	header("Location: index.php");
?>