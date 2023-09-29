<?php
session_start();
if(isset($_SESSION['name'])){
$customername = $_SESSION['name'];
$custid = $_SESSION['id'];}
include 'navbar.php';
$dsn = "mysql:host=localhost;dbname=game4";
$username = "root";
$password = "";
$currentDate = date('Y-m-d'); // This assumes you want to use the current date

$dbconn = new PDO($dsn, $username, $password);
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_SESSION['dob'])) {
    $dob = $_SESSION['dob'];
    $dobObj = new DateTime($dob);
    $currentDateObj = new DateTime($currentDate);
    $age = $currentDateObj->diff($dobObj)->y;
} else {
    $age = 18; 
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Aspekta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
    <title>Home Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>


<body style="font-family: 'Aspekta', sans-serif;">
    <div class="container main">
        <div class="A">

            <h4 class="heading pt-2" style="font-family: 'Press Start 2P'; font-size: 22px;  color: #dfdfdf;">
                <strong>Welcome to <br>ParaCrash Game Store</strong>
            </h4>
        </div>
        <div class="B">
            <div class="row row-cols-2 g-3">
                <div class="col card-body">
                    <div class="card mb-3 bcard" style="max-width: 650px;">
                        <h6 class="card-title cardtitle2 text-center">Most Played Game</h6>
                        <div class="row g-2">
                            <div class="col imgcards">
                                <img src="img 2/Fortnite.webp" class="img-fluid" />
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">Fortnite</h5>
                                    <p class="card-text">
                                        <small class="text-muted">Battle Royale: A player-versus-player game for up to
                                            100 players, allowing solo,
                                            duo, or squad play.</small>
                                    </p>
                                    <pre>Action , Battle-Royale</pre>
                                    <p class="card-text">
                                    <div style="display: flex; justify-content: space-evenly;">
                                        <form class="formbutton" method="GET" action="seppage.php">
                                            <input type="hidden" value="Fortnite" name="gameName">
                                            <button type="submit" class="btn">Buy</button>
                                        </form>
                                        <?php

                                        $GAMEIDquery = "SELECT gameid from games where gamename = 'Fortnite'";
                                        $gameidResult = $dbconn->query($GAMEIDquery);

                                        $gameidRow = $gameidResult->fetch(PDO::FETCH_ASSOC);
                                        $gameidtemp = $gameidRow['gameid'];

                                        $check_game_cart = "SELECT * FROM `cart` WHERE cartid = :cartid AND gameid = :gameid";
                                        $stmt_check_game_cart = $dbconn->prepare($check_game_cart);
                                        $stmt_check_game_cart->bindParam(':cartid', $custid);
                                        $stmt_check_game_cart->bindParam(':gameid', $gameidtemp);
                                        $stmt_check_game_cart->execute();
                                        if ($stmt_check_game_cart->rowCount() > 0) {
                                            echo '
                                                <form class="formbutton" method="POST" action="cart.php">
                                                <input type="hidden" name="gameid" value="<?php echo $gameidtemp; ?>">
                                            <button type="submit" class="btn" name="go_to_cart">Go to Cart</button>
                                            </form>
                                            ';
                                        } else {
                                            ?>
                                                <form class="formbutton3" method="POST">
                                                    <input type="hidden" name="gameid" value="Fortnite">
                                                    <button type="submit" class="btn"
                                                        name="add_to_cart_Fortnite">Add to Cart</button>
                                                </form>
                                                <?php
                                                if (isset($_POST['add_to_cart_Fortnite'])) { 
                                                    if (isset($_SESSION['id'])) {
                                                        $cartid = $_SESSION['id'];
                                                        $fortniteid = 'NUNA105'; // Assuming this is the valid game ID
                                                
                                                        $addquery = "INSERT INTO `cart`(`cartid`, `gameid`) VALUES ($cartid, '$fortniteid')";
                                                
                                                        try {
                                                            $stmt = $dbconn->query($addquery);
                                                        } catch (PDOException $e) {
                                                        }
                                                } else {
                                                    ?>
                                                    <script>
                                                        Swal.fire({
                                                            text: "It looks like you're trying to add an item to your cart. To start shopping with us and enjoy all the benefits, please sign up or create an account.",
                                                            showDenyButton: true,
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Login',
                                                            denyButtonText: 'Sign In',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                window.location.href = 'login.php';
                                                            } else if (result.isDenied) {
                                                                window.location.href = 'registeration.php';
                                                            } else {
                                                                Swal.fire('Continue as Visitor', '', 'info');
                                                            }
                                                        });
                                                    </script>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>

                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hrtag">
        <hr id="hrtag">
    </div>
    <div class="c">
        <div class="container">
            <div class="section Flipcards">
                <header class="p-2 text-center">
                    <h2 style="color:#dfdfdf;">Latest Games</h2>
                </header>
                <div class="container2">
                    <div class="row pl-3 pr-3 rowcards">

                        <?php
                        
                        if ($age >= 18) {
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games ORDER BY release_date DESC LIMIT 3";
                        } else {
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games WHERE gameid  LIKE '%NA%' ORDER BY release_date DESC LIMIT 3";
                        }
                        $stmt = $dbconn->prepare($query2);
                        $stmt->execute();
                        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($games as $game) {
                            $description = $game['mini_description'];
                            $description = explode('.', $description, 2);
                            $description = implode('. ', $description);
                            ?>
                            <div class="i pt-2">
                                <div class="c text-center">
                                    <div class="wrap">
                                        <img src="img/<?php echo $game['gamename']; ?>.webp" alt="#"
                                            class="img-responsive pt-2">
                                        <div class="info pt-2">
                                            <h5 class="name">
                                                <?php echo $game['gamename']; ?>
                                            </h5>
                                            <p class="position text-muted">Action Game</p>
                                        </div>
                                    </div>
                                    <div class="more pt-1">
                                        <p>
                                            <?php echo $description; ?>
                                        </p>

                                        <div class="formbutton3div">

                                            <form class="formbutton text-center pb-2" method="GET" action="seppage.php">
                                                <input type="hidden" value="<?php echo $game['gamename']; ?>"
                                                    name="gameName">
                                                <button type="submit" class="btn">Buy</button>
                                            </form>
                                            <?php


                                            $gameidtemp2 = $game['gameid'];

                                            $check_game_cart = "SELECT * FROM `cart` WHERE cartid = :cartid AND gameid = :gameid";
                                            $stmt_check_game_cart = $dbconn->prepare($check_game_cart);
                                            $stmt_check_game_cart->bindParam(':cartid', $custid);
                                            $stmt_check_game_cart->bindParam(':gameid', $game['gameid']);
                                            $stmt_check_game_cart->execute();
                                            if ($stmt_check_game_cart->rowCount() > 0) {
                                                ?>
                                                <form class="formbutton3" method="POST" action="cart.php">
                                                <input type="hidden" name="gameid" value="<?php echo $gameidtemp; ?>">
                                    <button type="submit" class="btn" name="go_to_cart">Go to Cart</button>
                                    </form>
                                    <?php
                                            } else  { 
                                                ?>
                                                <form class="formbutton3" method="POST">
                                                    <input type="hidden" name="gameid" value="<?php echo $gameidtemp2; ?>">
                                                    <button type="submit" class="btn"
                                                        name="add_to_cart_<?php echo $gameidtemp2; ?>">Add to Cart</button>
                                                </form>
                                                <?php
                                                if (isset($_POST['add_to_cart_' . $gameidtemp2])) { // Check the specific button for this game
                                                    if (isset($_SESSION['id'])) {
                                                        $cartid = $_SESSION['id'];
                                                        $addquery = "INSERT INTO `cart`(`cartid`, `gameid`) VALUES (:cartid, :gameid)";
                                                        $stmt = $dbconn->prepare($addquery);
                                                        $stmt->bindParam(':cartid', $cartid);
                                                        $stmt->bindParam(':gameid', $gameidtemp2); // Use the correct variable here

                                                        try {
                                                            $stmt->execute();
                                                        } catch (PDOException $e) {
                                                            // Handle the exception if needed
                                                        }
                                                    } else {
                                                        ?>
                                                        <script>
                                                            Swal.fire({
                                                                text: "It looks like you're trying to add an item to your cart. To start shopping with us and enjoy all the benefits, please sign up or create an account.",
                                                                showDenyButton: true,
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Login',
                                                                denyButtonText: 'Sign In',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    window.location.href = 'login.php';
                                                                } else if (result.isDenied) {
                                                                    window.location.href = 'registeration.php';
                                                                } else {
                                                                    Swal.fire('Continue as Visitor', '', 'info');
                                                                }
                                                            });
                                                        </script>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="row pl-3 pr-3 rowcards">

                        <?php
                         if ($age >= 18) {
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games ORDER BY release_date DESC LIMIT 3 OFFSET 3";
                        } else {
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games WHERE gameid LIKE '%NA%' ORDER BY release_date DESC LIMIT 3 OFFSET 3";
                        }
                        $stmt = $dbconn->prepare($query2);
                        $stmt->execute();
                        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($games as $game) {
                            $description = $game['mini_description'];
                            $description = explode('.', $description, 2);
                            $description = implode('. ', $description);
                            ?>
                            <div class="i pt-2">
                                <div class="c text-center">
                                    <div class="wrap">
                                        <img src="img/<?php echo $game['gamename']; ?>.webp" alt="#"
                                            class="img-responsive pt-2">
                                        <div class="info pt-2">
                                            <h5 class="name">
                                                <?php echo $game['gamename']; ?>
                                            </h5>
                                            <p class="position text-muted">Action Game</p>
                                        </div>
                                    </div>
                                    <div class="more pt-1">
                                        <p>
                                            <?php echo $description; ?>
                                        </p>

                                        <div class="formbutton3div">

                                            <form class="formbutton text-center pb-2" method="GET" action="seppage.php">
                                                <input type="hidden" value="<?php echo $game['gamename']; ?>"
                                                    name="gameName">
                                                <button type="submit" class="btn">Buy</button>
                                            </form>
                                            <?php


                                            $gameidtemp2 = $game['gameid'];

                                            $check_game_cart = "SELECT * FROM `cart` WHERE cartid = :cartid AND gameid = :gameid";
                                            $stmt_check_game_cart = $dbconn->prepare($check_game_cart);
                                            $stmt_check_game_cart->bindParam(':cartid', $custid);
                                            $stmt_check_game_cart->bindParam(':gameid', $game['gameid']);
                                            $stmt_check_game_cart->execute();
                                            if ($stmt_check_game_cart->rowCount() > 0) {
                                                echo '
                                                <form class="formbutton3" method="POST" action="cart.php">
                                                <input type="hidden" name="gameid" value="<?php echo $gameidtemp; ?>">
                                    <button type="submit" class="btn" name="go_to_cart">Go to Cart</button>
                                    </form>
                                    ';
                                            } else {
                                                ?>
                                                <form class="formbutton3" method="POST">
                                                    <input type="hidden" name="gameid" value="<?php echo $gameidtemp2; ?>">
                                                    <button type="submit" class="btn"
                                                        name="add_to_cart_<?php echo $gameidtemp2; ?>">Add to Cart</button>
                                                </form>
                                                <?php
                                                if (isset($_POST['add_to_cart_' . $gameidtemp2])) { // Check the specific button for this game
                                                    if (isset($_SESSION['id'])) {
                                                        $cartid = $_SESSION['id'];
                                                        $addquery = "INSERT INTO `cart`(`cartid`, `gameid`) VALUES (:cartid, :gameid)";
                                                        $stmt = $dbconn->prepare($addquery);
                                                        $stmt->bindParam(':cartid', $cartid);
                                                        $stmt->bindParam(':gameid', $gameidtemp2); // Use the correct variable here

                                                        try {
                                                            $stmt->execute();
                                                        } catch (PDOException $e) {
                                                            // Handle the exception if needed
                                                        }
                                                    } else {
                                                        ?>
                                                        <script>
                                                            Swal.fire({
                                                                text: "It looks like you're trying to add an item to your cart. To start shopping with us and enjoy all the benefits, please sign up or create an account.",
                                                                showDenyButton: true,
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Login',
                                                                denyButtonText: 'Sign In',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    window.location.href = 'login.php';
                                                                } else if (result.isDenied) {
                                                                    window.location.href = 'registeration.php';
                                                                } else {
                                                                    Swal.fire('Continue as Visitor', '', 'info');
                                                                }
                                                            });
                                                        </script>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hrtag">
            <hr id="hrtag">
        </div>


        <div class="container main">
            <h4 style="color:#dfdfdf;">Top Action Games</h4>
            <hr class="hrtag2">
            <div class="row p-1 g-4">
                <?php
                try {
                    if ($age >= 18) {
                        $actionQuery = "SELECT * FROM games WHERE genre_name LIKE '%Action%' LIMIT 4";
                        $racingQuery = "SELECT * FROM games WHERE genre_name LIKE '%Racing%' LIMIT 4";
                    } else {
                        $actionQuery = "SELECT * FROM games WHERE genre_name LIKE '%Action%' AND gameid  LIKE '%NA%' LIMIT 4";
                        $racingQuery = "SELECT * FROM games WHERE genre_name LIKE '%Racing%' AND gameid  LIKE '%NA%' LIMIT 4";
                    }
                    
                    $result = $dbconn->query($actionQuery);

                    // Loop through the results and generate the HTML
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col">';
                        echo '<div class="card smallcards" style="width: 13rem;">';
                        echo '<img class="card-img-top imgsmallcard" style="height: 13rem;" src="img/' . $row['gamename'] . '.webp">';
                        echo '<div class="card-body bodysmallcard pt-0">';
                        echo '<p class="card-text">' . $row['gamename'] . '</p>';
                        echo '<form class="formbutton formbutton2 text-center pb-1" method="GET" action="seppage.php">';
                        echo '<input type="hidden" value="' . $row['gamename'] . '" name="gameName">';
                        echo '<button type="submit" class="btn">Buy</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }


                } catch (Exception $e) {
                    echo "<pre><center>Sorry Can't Load Now</center></pre>";
                }
                ?>
            </div>



        </div>

        <div class="hrtag">
            <hr id="hrtag">
        </div>

        <div class="container main" style="padding-bottom: 10px;">
            <h4 style="color:#dfdfdf;">Top Racing Games</h4>
            <hr class="hrtag2">
            <div class="row p-1 g-4">
                <?php
                try {
                    

                    $result = $dbconn->query($racingQuery);

                    // Loop through the results and generate the HTML
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col ">';
                        echo '<div class="card smallcards" style="width: 13rem;">';
                        echo '<img class="card-img-top imgsmallcard" style="height: 13rem;" src="img/' . $row['gamename'] . '.webp">';
                        echo '<div class="card-body bodysmallcard pt-0">';
                        echo '<p class="card-text">' . $row['gamename'] . '</p>';
                        echo '<form class="formbutton formbutton2 text-center pb-1" method="GET" action="seppage.php">';
                        echo '<input type="hidden" value="' . $row['gamename'] . '" name="gameName">';
                        echo '<button type="submit" class="btn">Buy</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }

                    // Close the database connection (not needed for PDO)
                    // mysqli_close($connection);
                } catch (Exception $e) {
                    echo "<pre><center>Sorry Can't Load Now</center></pre>";
                }
                ?>
            </div>



        </div>

</body>

<style>
    .imgsmallcard {
        border-radius: 7px;
    }

    .formbutton2 {
        margin-top: auto;
        padding: 0;
        padding-bottom: 3px;
    }

    .bodysmallcard {
        text-align: center;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 0;
        border-radius: 12px;
        font-weight: bold;
        transition: 0.2s;
    }


    .smallcards {
        background-color: transparent;
        outline: 2px solid beige;
        border-radius: 3px;
        color: whitesmoke;
        border: none;
        overflow: hidden;
        height: 320px;

        transition: all 0.3s ease-in-out;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .smallcards {
        transition: all 0.3s ease;
    }

    .smallcards:hover {
        transition: all 0.4s ease;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        background-color: rgba(255, 255, 255, 0.28);
    }

    .smallcards:hover .imgsmallcard {
        transform: scale(1.06);
        transition: transform 0.3s ease;
        transform-origin: center center;
        backface-visibility: hidden;
        z-index: 1000;
        position: relative;

    }

    .hrtag2 {
        margin: 30px auto;
        max-width: 300px;
        border-top: 2px solid #333;
    }

    .rowcards {
        display: flex;
        justify-content: space-between;
  animation: slideFromBottom 1s ease-in-out;
    }

    .img-responsive {
        max-width: 90%;
        height: 100%;
        border-radius: 5px;
    }

    .Flipcards {
        padding-bottom: 25px;
        background-color: rgba(173, 216, 230, 0.28);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        height: 100%;
    }

    .Flipcards h2 {
        color: #fff;
        margin: 0 0 30px 0;
    }

    .position {
        font-size: 10px;
    }

    @media (max-width:500px) {
        .i {
            height: 400px;
            width: 230px;
            align-self: center;
            padding: 0;
        }

        .more {
            font-size: 12px;
            padding: 2px;

        }

        .rowcards {
            justify-content: center;
        }
    }

    .i {
        max-width: 270px;
        height: 400px;
    }

    .Flipcards .i .c {
        background: #fff;
        -webkit-box-shadow: 0 4px 0 #2b86ac;
        -moz-box-shadow: 0 4px 0 #2b86ac;
        box-shadow: 0 4px 0 #2b86ac;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -moz-background-clip: padding;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        position: relative;
        overflow: hidden;
        padding-bottom: 110px;
    }

    .Flipcards .i .c .wrap {
        position: relative;
    }

    @keyframes slideFromBottom {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .Flipcards .i .c .wrap img {
        width: 100%;
        height: 250px;
        /* Set your desired fixed height for the images */
        object-fit: cover;
        /* Ensures the image covers the entire container */
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        transition: all 0.3s ease;
    }

    .Flipcards .i .c .wrap .info {
        padding: 10px 0;
        position: absolute;
        top: 100%;
        width: 100%;

    }

    .Flipcards .i .c .wrap .info .name {
        margin: 0;
        font-size: 20px;
        padding: 1px;
        font-weight: 700;
        margin: 0 0 8px 0;
    }

    .more {
        padding-top: 2px;
        font-size: 14px;
        color: dodgerblue;
        font-weight: bold;
        font-family: 'Satoshi', sans-serif !important;
    }

    .Flipcards .i .c .wrap .info .position {
        margin: 0;
        font-size: 15px;
        color: #555659;
    }

    .Flipcards .i .c .more {
        position: absolute;
        bottom: -100%;
        width: 100%;

    }

    .Flipcards .i .c .more p {
        margin: 0 18px 30px 18px;
        line-height: 22px;

    }

    .Flipcards .i .c:hover img {
        -moz-opacity: 0;
        -khtml-opacity: 0;
        -webkit-opacity: 0;
        opacity: 0;
    }

    .i:hover .c {
        transition: 0.3s;
        box-shadow: rgba(0, 0, 0, 0.4) 0px 19px 38px, rgba(0, 0, 0, 0.33) 0px 15px 12px;

    }

    .Flipcards .i .c:hover .info {
        top: 0;
    }

    .Flipcards .i .c:hover .more {
        bottom: 0;
    }

    .container {
        max-width: 85%;
    }

    .hrtag {
        padding: 0 15px;
        size: 3px;
        border-radius: 10px;
    }

    .cardpotratit {
        max-width: 400px;
        border-radius: 16px;
        padding: 4px;
    }

    .text-muted {

        font-family: 'Satoshi', sans-serif;
    }

    .card-text {
        font-size: 17px;
        padding: 1px 2px;
        font-family: 'Nohemi', sans-serif;
    }

    .formbutton {
        text-decoration: none;
        text-align: left;
    }

    .formbutton3div {
        text-decoration: none;
        text-align: center;
        display: flex;
        justify-content: space-evenly;
    }

    .btn {
        text-align: center;
        background-color: black;
        color: beige;
        outline: 2px solid black;
        border-radius: 4px;
        transition: 0.5s;
    }

    .btn:hover {
        background-color: #33363D;
        border-radius: 7px;
        color: blanchedalmond;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    .cardtitle2 {
        background-image: linear-gradient(to left, darkblue, Purple);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .bcard {
        font-family: 'Nohemi', sans-serif;
        background: linear-gradient(135deg, #9D7ABD, #E1A2B7, #F4E3EE);
        background-color: rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow:
            0px 15.3px 74.2px rgba(0, 0, 0, 0.075),
            0px 20.7px 73.3px rgba(0, 0, 0, 0.099),
            0px 25.2px 65.6px rgba(0, 0, 0, 0.124),
            0px 43px 80px rgba(0, 0, 0, 0.21);
        padding: 8px;
        max-width: 400px;
    }

    .container2 {
        padding: 0px 40px
    }

    .card-body {
        max-height: 500px !important;
    }

    .img-fluid {
        max-width: 100%;
        height: 100%;
        border-radius: 10px;
        padding: 5px;
    }

    .main {
        display: flex;
        background-color: none;
        justify-content: center;
        padding-top: 20px;
        gap: 10px;
        max-width: 98%;
        align-items: center;
    }

    .B {
        width: 50%;
        padding-right: 8px;
        padding-left: 8px;
        padding-bottom: 20px;
    }

    .A {
        width: 50%;
    }

    body {
        font-family: sans-serif;
        background: linear-gradient(180deg, slateblue,#404ccc) !important;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        height: 100% !important;
        padding: 5px 7px !important;
    }

    @media (max-width: 768px) {
        .main {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .bcard {
            text-align: center;
            width: 300px;
            height: 450px;
            align-self: center;
        }

        .A {
            width: 100%;
            text-align: center;
        }

        .formbutton {
            text-align: center;
        }
    }

    .name,
    .card-title {
        font-family: 'Nohemi', sans-serif !important;
    }

    @keyframes glowing {
        0% {
            color: #343434;
            text-shadow: none;
        }

        50% {
            color: #9D7ABD;
            text-shadow: 0 0 3px #9D7ABD, 0 0 2px #9D7ABD;
        }

        100% {
            color: #343434;
            text-shadow: none;
        }
    }

    .A {
        padding: 0px inherit;
    }

    .heading {
        font-family: 'Press Start 2P';
        font-size: 22px;
        animation: glowing 3s infinite;

    }
</style>

</html>
<?php include 'footer.php'; ?>