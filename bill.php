<?php
session_start();
include 'navbar.php';
$dsn = "mysql:host=localhost;dbname=game4";
$username = "root";
$password = "";
$dbconn = new PDO($dsn, $username, $password);
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Cart Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body style="font-family: 'Nohemi', sans-serif;">
    
</body>
    <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(#6495ED, #5D3FD3) !important;
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            height: 100vh;
        }

    </style>

    </html>
    <?php include 'footer.php'; ?>