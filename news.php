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
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <title>News Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Include Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>



<body>
    <div class="container main mb-6">
        <div class="container child1 w-50">
            <img src="img/Ghostwire Tokyo.webp" class="img1">
            <div class="img1txt">
                <p>New Relased Game ! </p>
            </div>
        </div>
    </div>

</body>

<style>
    .img1 {
        max-width: 500px;
        height: 300px;
        position: relative;
        display: inline-block;
    }

    .img1txt {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
    }

    .img1:hover .img1txt {
        butoom: 10;
    }

    .child1 {
        border: 2px solid whitesmoke;
    }

    body {
        font-family: sans-serif;
        background: linear-gradient(#404ccc, slateblue);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>

</html>
<?php include 'footer.php'; ?>