<?php
session_start();
$sessionid = $_SESSION['id'];
$chatid = $_POST['chatid'];
$connection = new mysqli("localhost", "root", "", "chatbox");
$update_query = "UPDATE `messages` SET `status` = 1 WHERE ( `to_id` = $sessionid AND `from_id` = $chatid ) AND `status` = 0";
$update_query_run = mysqli_query($connection, $update_query);
?>