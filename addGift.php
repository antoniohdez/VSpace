<?php
        require_once("driver.php");

        $driver = new dbDriver();

        $gift = $_POST['gift'];
        $msg = $_POST['message'];
        $user = $_POST["user_id"];
        $tag = $_POST["id"];

        $driver->addGift($gift, $msg, $user, $tag);
?>