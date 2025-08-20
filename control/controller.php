<?php
session_start();
$connection = new mysqli("localhost", "root", "", "chatbox");


if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $filetype = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if ($filetype != "png") {
        echo "Invalid File Type";
        die();
    }

    $newname = $username.".png";
    $imgpath = "assets/img/".$newname;

    move_uploaded_file($tempname, $imgpath);

    $query = "INSERT INTO `users`(`name`, `username`, `password`, `image`) VALUES ('$name','$username','$password','$imgpath')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        header("Location: /login");
    }
    else {
        echo "Error";
    }
}


if (isset($_POST['login_btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run) > 0) {
        $data = mysqli_fetch_array($query_run);
        if ($data['username'] == $username && $data['password'] == $password) {
            $id = $data['id'];
            $_SESSION['id'] = $id;
            header("Location:/");
        }
        else {
            echo "Invalid Username or Password";
        }
    }
    else {
        echo "Error";
    }

}

if(isset($_POST['add_contact'])){

    $username = $_POST['username'];
    $select_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $select_query_run = mysqli_query($connection, $select_query);
    if(mysqli_num_rows($select_query_run) > 0){
        $contact_data = mysqli_fetch_array($select_query_run);
        $insert_query = "INSERT INTO `contacts`(`user_id`, `cont_user_id`) VALUES ('$_SESSION[id]','$contact_data[id]')";
        $insert_query_run = mysqli_query($connection, $insert_query);
        if($insert_query_run){
            header("Location:/");
        }
        else{
            echo "Error";
            // header("Location:/add");
        }
    }
    else{
        echo "Invalid Username";
        // header("Location:/add");
    }
    
   
}


?>