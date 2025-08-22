<?php
session_start();
$connection = new mysqli("localhost", "root", "", "chatbox");

$toid = $_POST['to_id'];
$fromid = $_SESSION['id'];
$message = $_POST['message'];

// Insert the message
$insert_query = "INSERT INTO `messages`(`to_id`, `from_id`, `message`) VALUES ('$toid','$fromid','$message')";
$insert_query_run = mysqli_query($connection, $insert_query);

if($insert_query_run){
    // Get the message ID of the newly inserted message
    $message_id = mysqli_insert_id($connection);
    
    // Update last_msg in contacts table for the sender
    $update_sender_contact = "UPDATE `contacts` SET `last_msg` = '$message_id' 
                             WHERE `user_id` = '$fromid' AND `cont_user_id` = '$toid'";
    mysqli_query($connection, $update_sender_contact);
    
    // Update last_msg in contacts table for the receiver (if they have the sender as contact)
    $update_receiver_contact = "UPDATE `contacts` SET `last_msg` = '$message_id' 
                               WHERE `user_id` = '$toid' AND `cont_user_id` = '$fromid'";
    mysqli_query($connection, $update_receiver_contact);
    
    echo "Message sent successfully";
}
else{
    echo "Error sending message";
}
?>