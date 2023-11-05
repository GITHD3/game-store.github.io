<?php
session_start();
if (isset($_SESSION['name'])) {
    $customername = $_SESSION['name'];
    $custid = $_SESSION['id'];
}
include 'navbar.php';
$dsn = "mysql:host=localhost;dbname=game4";
$username = "root";
$password = "";
$currentDate = date('Y-m-d');

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
    <link rel="stylesheet" href="main1.css">

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
                                                <button type="submit" class="btn" name="add_to_cart_Fortnite">Add to
                                                    Cart</button>
                                            </form>
                                            <?php
                                            if (isset($_POST['add_to_cart_Fortnite'])) {
                                                if (isset($_SESSION['id'])) {
                                                    $cartid = $_SESSION['id'];
                                                    $fortniteid = 'NUNA105';

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
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games WHERE deactivate = 0 ORDER BY release_date DESC LIMIT 3";
                        } else {
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games WHERE gameid  LIKE '%NA%' AND deactivate = 0 ORDER BY release_date DESC LIMIT 3";
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
                                            } else {
                                                ?>
                                                <form class="formbutton3" method="POST">
                                                    <input type="hidden" name="gameid" value="<?php echo $gameidtemp2; ?>">
                                                    <button type="submit" class="btn"
                                                        name="add_to_cart_<?php echo $gameidtemp2; ?>">Add to Cart</button>
                                                </form>
                                                <?php
                                                if (isset($_POST['add_to_cart_' . $gameidtemp2])) {
                                                    if (isset($_SESSION['id'])) {
                                                        $cartid = $_SESSION['id'];
                                                        $addquery = "INSERT INTO `cart`(`cartid`, `gameid`) VALUES (:cartid, :gameid)";
                                                        $stmt = $dbconn->prepare($addquery);
                                                        $stmt->bindParam(':cartid', $cartid);
                                                        $stmt->bindParam(':gameid', $gameidtemp2);
                                        
                                                        try {
                                                            $stmt->execute();
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
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games WHERE deactivate = 0 ORDER BY release_date DESC LIMIT 3 OFFSET 3";
                        } else {
                            $query2 = "SELECT gameid, gamename, mini_description, price FROM games WHERE gameid LIKE '%NA%' AND deactivate = 0 ORDER BY release_date DESC LIMIT 3 OFFSET 3";
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



</html>
<?php include 'footer.php'; ?>