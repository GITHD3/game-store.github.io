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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>


<body>
    <div class="Maincontent container pt-2 pl-8 pr-8">
        <div class="headingnews p-0 pb-3">
            <h2>News</h2>
        </div>
        <div class="container main p-0 display-flex">
            <div class=" card1">
                <div class="image-container">
                    <img src="img 2/Ghostwire Tokyo.webp" alt="Image">
                    <div class="hover-text text-center p-4">Step into the bewitching world of GhostWire Tpyo - a
                        thrilling new game
                        where typos come to life and spellbinding adventures await</div>
                </div>
            </div>
            <div class="card2">
                <div class="image-container">
                    <img src="img/Watch Dogs.webp" alt="Image">
                    <div class="hover-text text-center p-4">Step into the bewitching world of GhostWire Tpyo - a
                        thrilling new game
                        where typos come to life and spellbinding adventures await</div>
                </div>
            </div>

        </div>
    </div>

</body>

<style>
    .main {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        max-height: 500px;
    }
    @media(max-width:700px){
        .main{
            display: flex;
            flex-wrap: wrap;
        }
        .card2 , .card1{
            padding: 8px 0px;
        }
    }

    .card2 {
        max-width: 300px;
        height: 100%;
        border: none;
        border-radius: 7px;
        overflow: hidden;
    }
    
    .card1 {
        height: 100%;
        max-width: 700px;
        border: none;
        border-radius: 7px;
        overflow: hidden;
    }

    .image-container {
        position: relative;
    }

    .image-container img {
        width: 100%;
        height: auto;
    }

    .hover-text {
        font-weight: bold;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        display: flex;
        align-items: end;
        justify-content: center;
        opacity: 0;
        /* Initially set the opacity to 0, so it's hidden */
        transition: opacity 0.3s ease;
    }

    .image-container:hover .hover-text {
        opacity: 1;
        /* When hovering over the image-container, set the opacity to 1, so it becomes visible */
    }


    body {
        background: linear-gradient(#404ccc, slateblue);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

    }
</style>

</html>
<?php include 'footer.php'; ?>