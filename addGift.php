<?php
        require_once("driver.php");

        $driver = new dbDriver();

        $gift = $_POST['gift'];
        $msg = $_POST['message'];
        $user = $_SESSION["user_id"];

        $driver->addGift($gift, $msg, $user);
?>