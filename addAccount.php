<?php
	require_once("driver.php");

	$driver = new dbDriver();
	if($_POST['password'] === $_POST['password2']){
		$driver->addAccount($_POST['name'], $_POST['email'], md5($_POST['password']));
	}

	header("Location: index.php");
?>