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
        <div class="col container main p-0 display-flex">
            <div class="row card1">
                <div class="image-container">
                    <img src="img 2/Ghostwire Tokyo.webp" alt="Image">
                    <div class="hover-text text-center p-0 m-0">Step into the bewitching world of GhostWire Tpyo - a
                        thrilling new game
                        where typos come to life and spellbinding adventures await</div>
                </div>
            </div>
            <div class="row card2">
                <div class="image-container">
                    <img class="imgcard2" src="img/Watch Dogs.webp" alt="Image">
                    <div class="hover-text text-center">Step into the bewitching world of GhostWire Tpyo - a
                        thrilling new game
                        where typos come to life and spellbinding adventures await</div>
                </div>
            </div>
            <div class="row card2">
                <div class="image-container">
                    <img class="imgcard2" src="img/DayZ.webp" alt="Image">
                    <div class="hover-text text-center">Step into the bewitching world of GhostWire Tpyo - a
                        thrilling new game
                        where typos come to life and spellbinding adventures await</div>
                </div>
            
</div>
        </div>
        <hr></hr>
    <div class="col container main2 p-0 display-flex">
        <div class="a1 col">
                <div class="image-container2 row ">
                    <img class="row a1card" src="img/DayZ.webp" alt="Image">
                    <div class="row texta1card">Step into the bewitching world of GhostWire Tpyo - a
                        thrilling new game
                        where typos come to life and spellbinding adventures await</div>
                </div>
                <br>
                <div class="image-container2 row ">
                    <img class="row a1card" src="img/DayZ.webp" alt="Image">
                    <div class="row texta1card">Step into the bewitching world of </div>
                </div>
                <br>
            </div>
            <div class="b1 col">
            <div class="vl col"></div>
            
            </div>
            <hr></hr>
    </div>
    </div>

</body>

<style>
    .vl {
  border-left: 6px solid green;
  height: 500px;
  
}
    @media(max-width:1200px){
        .texta1card{
        font-size: small;
        justify-self: center;
        padding-left: 0px;
        width: 100%;
        }
        .a1card{
            width: 150px;
            height: 150px !important;   
        }
        .image-container2{
            width: 150px !important;

        }
    }
    .texta1card{
        padding: 0px 2px;
        width: 60%;
        text-align:left;
        padding-left: 27px;
    }
    .image-container2{
        width: 100%;
        display: flex;
        flex-wrap: wrap ;
        align-items: center;
        border: 1px solid #171717;    
        border-radius: 4px; 
        background-color: rgba(0,0,0,0.5);
        color: whitesmoke; 
    }
    .a1{
        width: 30%;
        
    }
    
    .a1card{
        max-width: 150px;
        height: 170px !important;
    }
    .b1{
        width: 70%;
    }
    hr{
        width: 100%;
        color: black;
    }
    .imgcard2{
        height: 358px !important;
    }
    .main {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        max-height: 500px;
    }
    @media(max-width:1200px){
        .main{
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            
        }
        .card2 , .card1{
            padding: 8px 0px;
        }
        .card1{
            width: 400px;
        }
        .hover-text{
            font-weight: normal;
            font-size: 13px;
        }
        .card2{
            width:  200px;
            padding: 0px 8px;
        }
        .imgcard2{
            height: 200px !important;
            padding-bottom: 2px;
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
        max-width: 700px;
        height: 100%;
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
        background-color: rgba(0, 0, 0, 0.45);
        color: #fff;
        display: flex;
        align-items: end;
        justify-content: center;
        opacity: 0;
        /* Initially set the opacity to 0, so it's hidden */
        transition: opacity 0.4s ease;
    }

    .image-container:hover .hover-text {
        opacity: 1;
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
