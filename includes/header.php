<?php session_start();
$connection = new mysqli("localhost", "root", "", "chatbox");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBox</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href= "../assets/styles/style.css">
</head>
<body>
<?php 
function auth()
{
    $sessionid = $_SESSION['id'];
    if ($sessionid == true) {
        
    }
    else {
        header("Location: /login");
    }

}

$date = new DateTime;
?>