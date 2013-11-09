<?php
	require_once("driver.php");

	$driver = new dbDriver();

	$gift = $_POST['gift'];
	$msg = $_POST['message'];
	$user = "1";

	$driver->addGift($gift, $msg, $user);
?>