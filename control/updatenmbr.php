<?php
session_start();
$sessionid = $_SESSION['id'];
$chatid = $_POST['chatid'];
$connection = new mysqli("localhost", "root", "", "chatbox");
$select_query = "SELECT * FROM `messages` WHERE `to_id` = $sessionid AND `from_id` = $chatid AND `status` = 0";
$select_query_run = mysqli_query($connection, $select_query);
echo mysqli_num_rows($select_query_run);
?>