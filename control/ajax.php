<?php
session_start();
$connection = new mysqli("localhost", "root", "", "chatbox");

// if (isset($_POST['send_btn'])){
    $toid = $_POST['to_id'];
    $fromid = $_SESSION['id'];
    $message = $_POST['message'];

    $insert_query = "INSERT INTO `messages`(`to_id`, `from_id`, `message`) VALUES ('$toid','$fromid','$message')";
    $insert_query_run = mysqli_query($connection, $insert_query);
    if($insert_query_run){
        header("Location:/chat/$toid");
    }
    else{
        echo "Error";
    }
// }

?>