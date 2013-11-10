<?php
        require_once("driver.php");

        $driver = new dbDriver();

        $feeling = $_POST['feeling'];
        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];
        $msg = $_POST['message'];
        $user = $_POST['user_id'];

        $driver->addTag($feeling, $lat, $lng, $msg, $user);
?>