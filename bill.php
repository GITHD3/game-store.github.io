<?php
$c = 1;
session_start();
$tempchecker = false;
$total_storage_required = 0; ?>
<div class="non-printable">
    <?php
    include 'navbar.php'; ?>
</div>
<?php
try {
    $billid = 1;
    $date = date('Y-m-d');
    $dsn = "mysql:host=localhost;dbname=game4";
    $username = "root";
    $password = "";
    $dbconn = new PDO($dsn, $username, $password);
    $fn = $_SESSION['name'];
    $tempid = $_SESSION['id'];
    $query21 = "SELECT lastname FROM customer WHERE customerid=:tempid";
    $st_ln = $dbconn->prepare($query21);
    $st_ln->bindParam(':tempid', $tempid, PDO::PARAM_INT);
    $st_ln->execute();

    $ln_result = $st_ln->fetch(PDO::FETCH_ASSOC);
    $ln = $ln_result['lastname'];
} catch (Exception $e) {
    // Exception is caught but not echoed, so no error message will be displayed on the webpage.
}


if (isset($_SESSION['id'])) {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <title>Bill Page</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    </head>

    <body style="font-family: 'Nohemi', sans-serif;">
        <div class="print-container">
            <?php
            if (isset($_GET['checkoutButton'])) {
                $cartid = $_SESSION['id'];
                $totalcart = $_GET['total'];
                ?>

                <div class="maindiv flex">
                    <div class="A">
                        <?php
                        $query = "SELECT DISTINCT c.gameid, g.gamename, g.price, g.storage_required 
                    FROM cart c
                    JOIN games g ON c.gameid = g.gameid
                    WHERE c.cartid = :cartid
                    ";
                        $st_cart = $dbconn->prepare($query);
                        $st_cart->bindParam(':cartid', $cartid, PDO::PARAM_INT);
                        $st_cart->execute();

                        if ($st_cart->rowCount() > 0) {
                            $allGamesInBill = true; // Assume all games are in the bill table
                
                            // Retrieve game details and check if they are in the bill table
                            $gamedetail = array();
                            while ($row = $st_cart->fetch(PDO::FETCH_ASSOC)) {
                                $gameId = $row['gameid'];
                                $query2 = "SELECT gamename, price, storage_required FROM games WHERE gameid = :gameId";
                                $st_game = $dbconn->prepare($query2);
                                $st_game->bindParam(':gameId', $gameId);
                                $st_game->execute();
                                $detailfromquery = $st_game->fetch(PDO::FETCH_ASSOC);

                                // Check if this game is in the bill table
                                $query = "SELECT bill_id FROM bill WHERE gameid = :game_id AND customerid = :customer_id";
                                $statement = $dbconn->prepare($query);
                                $statement->bindParam(':game_id', $gameId, PDO::PARAM_INT);
                                $statement->bindParam(':customer_id', $tempid, PDO::PARAM_INT);
                                $statement->execute();
                                $ress = $statement->fetch(PDO::FETCH_ASSOC);

                                if (!$ress) {
                                    $allGamesInBill = false;
                                    break; // No need to continue checking if one game is missing in the bill table
                                }

                                $gamedetail[] = [
                                    'id' => $gameId,
                                    'gamename' => $detailfromquery['gamename'],
                                    'price' => $detailfromquery['price'],
                                    'storage_required' => $detailfromquery['storage_required']
                                ];
                            }
                            ?>

                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <div class="wrapper">
                                                <div class="product-img">
                                                    <img src="gif/ShopA.png" class="shop">
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-text">
                                                        <h1>ParaCrash Game Store</h1>
                                                        <h2>by Harsh and Devansh</h2>
                                                        <p>Date -
                                                            <?php echo $date; ?>
                                                        </p>
                                                        <p>Name - <span>
                                                                <?php echo $ln . ' ' . $fn; ?>
                                                            </span></p>
                                                        <!-- <p>Storage Required - <span><?php echo $total_storage_required * 10; ?> GB</span></p> -->


                                                        <p>Total Amount - <span> &#8377;
                                                                <?php echo $totalcart; ?>
                                                            </span></p>
                                                    </div>
                                                    <div class="product-price-btn">
                                                        <div class="a1">
                                                            <form method="POST">
                                                                <button onclick="printBill()" name="cartsubmit" type="submit">Buy
                                                                    Now</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <table class=" maintable min-w-full text-left text-sm font-light">
                                                <thead class="border-b font-medium dark:border-neutral-500">
                                                    <tr>
                                                        <th scope="col" class="px-1 text-center py-2">Sr</th>
                                                        <th scope="col" class="px-1 text-center py-2">Game Name</th>
                                                        <th scope="col" class="px-1 text-center py-2">Storage Required</th>
                                                        <th scope="col" class="px-1 text-center py-2">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($gamedetail as $index => $game):
                                                        $storage = $game['storage_required'];
                                                        preg_match('/(\d+)(\w+)/', $storage, $matches);
                                                        if (isset($matches[1]) && isset($matches[2])) {
                                                            $value = $matches[1];
                                                            $unit = $matches[2];
                                                            if ($unit === 'MB') {
                                                                $value /= 1024; // Convert MB to GB
                                                            }
                                                            $total_storage_required += $value;
                                                        } ?>
                                                        <tr
                                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                <?php echo $index + 1; ?>
                                                                <?php try {
                                                                    $query = "SELECT bill_id FROM bill WHERE gameid = :game_id AND customerid = :customer_id";
                                                                    $statement = $dbconn->prepare($query);
                                                                    $statement->bindParam(':game_id', $game['id'], PDO::PARAM_INT);
                                                                    $statement->bindParam(':customer_id', $tempid, PDO::PARAM_INT);
                                                                    $statement->execute();
                                                                    $ress = $statement->fetch(PDO::FETCH_ASSOC);

                                                                    
                                                                } catch (Exception $e) {
                                                                } ?>
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <?php echo $game['gamename']; ?>
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <?php echo $game['storage_required']; ?>
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <?php echo $game['price']; ?>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if (isset($_POST['cartsubmit'])) {
                                try {
                                    $cid = $cartid;
                                    $query = "SELECT bill_id FROM bill ORDER BY bill_id DESC LIMIT 1";
                                    $statement2 = $dbconn->prepare($query);
                                    $statement2->execute();
                                    $lastBillIdEntry = $statement2->fetch(PDO::FETCH_NUM);
                                    if ($lastBillIdEntry) {
                                        $billid = $lastBillIdEntry[0] + 1;
                                    } else {
                                        $billid = 1;
                                    }
                                    $gameNamesCart = array();
                                    foreach ($gamedetail as $index => $gd) {
                                        $id = $gd['id'];
                                        $amt = $gd['price'];

                                        $checkQuery = "SELECT COUNT(*) FROM bill WHERE gameid = :gameid AND customerID = :customerID";
                                        $checkStatement = $dbconn->prepare($checkQuery);
                                        $checkStatement->execute([
                                            ':gameid' => $id,
                                            ':customerID' => $tempid
                                        ]);
                                        $count = $checkStatement->fetchColumn();

                                        if ($count == 0) {
                                            $query11 = "INSERT INTO `bill` (`bill_id`,`gameid`, `bill_date`, `amount`, `customerID`) 
                                                    VALUES (:bid , :gameid, :bill_date, :amount, :customerID)";
                                            $statement2 = $dbconn->prepare($query11);
                                            $statement2->execute([
                                                ':bid' => $billid,
                                                ':gameid' => $id,
                                                ':bill_date' => $date,
                                                ':amount' => $amt,
                                                ':customerID' => $tempid
                                            ]);
                                            $deleteCartQuery = "DELETE FROM cart WHERE cartid = :cid";
                                            $deleteCartStatement = $dbconn->prepare($deleteCartQuery);
                                            $deleteCartStatement->execute([
                                                ':cid' => $cid
                                            ]);
                                            $c = 0;
                                            ?>
                                            <p class="Ack">Purchased Successfully</p>

                                            
                                            <?php

                                        } else {
                                            $c = 0;
                                            ?>
                                            <p class="Ack">Purchased</p>
                                            <?php
                                            break;
                                        }
                                        if ($c == 0) {
                                            $gameNames[] = $game['gamename']; // Add game names to the array
                                        }
                                    }
                                } catch (Exception $e) {
                                    echo "Try Later On. Error on line " . $e->getLine() . ": " . $e->getMessage();

                                }
                            }
                                            if ($statement2) { ?>
                                               <script>
        var gameNames = <?php echo json_encode($gameNamesCart); ?>; // Get the game names array
        gameNames.forEach(function(gamename) {
            var zipUrl = 'zips/' + gamename + '.zip';
            var a = document.createElement('a');
            a.href = zipUrl;
            a.download = gamename + '.zip';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });

    setTimeout(function () {
        downloadGames();
    }, 2000);
</script>
                                            <?php }
                        }
            } else if (isset($_GET['gameid'])) {
                $chck = 0;
                $game_id = $_GET['gameid'];
                try {
                    $queryalpha = "Select bill_id from bill where gameid = $game_id and customerid  = $tempid ; ";
                    $checkexist = $dbconn->query($queryalpha);
                } catch (Exception $e) {
                    $checkexist = 1;
                }
                if ($checkexist <= 0) {
                    $chck = 7;
                    ?>
                                <p class="Ack">You have Already Purchased the Game</p>
                            <?php
                } else {
                    $querydelta = "SELECT  `gamename`,  `price`, `gamesize`, `storage_required` FROM `games` WHERE gameid = :game_ID";
                    $statement = $dbconn->prepare($querydelta);
                    $statement->bindParam(':game_ID', $game_id);
                    $statement->execute();
                    $res2 = $statement->fetch(PDO::FETCH_ASSOC);
                    $game_name_seppage = $res2['gamename'];
                    $game_price_seppage = $res2['price'];
                    $game_storage_required_seppage = $res2['storage_required'];
                    ?>
                                <div class="maindiv flex">
                                    <div class="A">
                                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                            <div class="overflow-hidden">
                                                <div class="wrapper">
                                                    <div class="product-img">
                                                        <img src="gif/ShopA.png" class="shop">
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-text">
                                                            <h1>ParaCrash Game Store</h1>
                                                            <h2>by Harsh and Devansh</h2>
                                                            <p>Date -
                                                            <?php echo $date; ?>
                                                            </p>
                                                            <p>Name - <span>
                                                                <?php echo $ln . ' ' . $fn; ?>
                                                                </span></p>
                                                            <p>Game - <span>
                                                                <?php echo $game_name_seppage; ?>
                                                                </span></p>
                                                            <!-- <p>Storage Required - <span><?php echo $total_storage_required * 10; ?> GB</span></p> -->


                                                            <p>Amount - <span> &#8377;
                                                                <?php echo $game_price_seppage; ?>
                                                                </span></p>
                                                        </div>
                                                        <div class="product-price-btn">
                                                            <div class="a1">
                                                                <form method="POST">
                                                                    <button name='submit' onclick="printBill()" id="buyButton"
                                                                        type='submit'>
                                                                        Buy Now</button>
                                                                </form>
                                                            </div>
                                                        <?php try {
                                                            $query = "SELECT bill_id FROM bill WHERE gameid = :game_id AND customerid = :customer_id";
                                                            $statement = $dbconn->prepare($query);
                                                            $statement->bindParam(':game_id', $game_id, PDO::PARAM_INT);
                                                            $statement->bindParam(':customer_id', $tempid, PDO::PARAM_INT);
                                                            $statement->execute();
                                                            $ress = $statement->fetch(PDO::FETCH_ASSOC);


                                                        } catch (Exception $e) {
                                                        } ?>

                                                        </div>
                                                    </div>

                                                    <div class="product-img2 inline-block">
                                                        <img src="img 2/<?php echo $game_name_seppage; ?>.webp" class="shop">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            span {
                                                font-family: 'Suranna', serif;
                                                font-size: 20px !important;
                                            }
                                        </style>
                                        <?php

                                        if (isset($_POST['submit'])) {
                                            $query = "SELECT bill_id FROM bill ORDER BY bill_id DESC LIMIT 1";
                                            $statement = $dbconn->prepare($query);
                                            $statement->execute();
                                            $lastBillIdEntry = $statement->fetch(PDO::FETCH_NUM);
                                            if ($lastBillIdEntry) {
                                                $billid = $lastBillIdEntry[0] + 1;
                                            } else {
                                                $billid = 1;
                                            }
                                            $checkQuery = "SELECT COUNT(*) FROM bill WHERE gameid = :gameid AND customerID = :customerID";
                                            $checkStatement = $dbconn->prepare($checkQuery);
                                            $checkStatement->execute([
                                                ':gameid' => $game_id,
                                                ':customerID' => $tempid
                                            ]);
                                            $count = $checkStatement->fetchColumn();

                                            if ($count == 0) {
                                                $query11 = "INSERT INTO `bill` (`bill_id`,`gameid`, `bill_date`, `amount`, `customerID`) 
                    VALUES (:id,:gameid, :bill_date, :amount, :customerID)";
                                                $statement = $dbconn->prepare($query11);
                                                $statement->execute([
                                                    ':id' => $billid,
                                                    ':gameid' => $game_id,
                                                    ':bill_date' => $date,
                                                    ':amount' => $game_price_seppage,
                                                    ':customerID' => $tempid
                                                ]);

                                                if ($statement) {
                                                    ?>

                                                    <script>
                                                        setTimeout(function () {
                                                            var name = "<?php echo $game_name_seppage; ?>";
                                                            var a = document.createElement("a");
                                                            a.href = "zips/" + name + ".zip";
                                                            a.download = name + ".zip";
                                                            document.body.appendChild(a);
                                                            a.click();
                                                            document.body.removeChild(a);
                                                        }, 2000);
                                                    </script>

                                                    <p class="Ack">Purchased Successfully</p>
                                            <?php }

                                            } else {

                                                ?>
                                                <p class="Ack">Purchased</p>

                                            <?php
                                            }
                                        }
                }
            } else {
                echo "Invalid Access";
            }
            ?>
                        </div>

                    </div>

                    <?php


                    ?>
                </div>
    </body>
    <script>
        function printBill() {
            const downloadBill = confirm("Do you want to download the bill?");
            if (downloadBill) {
                window.print();
            }
        }

    </script>
    <style>
        @media print {
            .print-container {
                visibility: visible;
            }

            .non-printable {
                display: none;
            }
        }


        .shop {
            width: 100%;
        }

        .Ack {
            font-family: 'Press Start 2p';
            font-size: 20px;
            text-align: center;
            color
        }

        .wrapper {
            height: 420px;
            width: 654px;
            margin: 7px auto;
            border-radius: 7px 7px 7px 7px;
            -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            float: left;
            height: 420px;
            width: 327px;
            display: flex;
            align-items: center;
            background-color: #a8a8cf;
            transition: all 0.27s ease-in-out;
        }

        .product-img2:hover .wrapper {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px !important;
        }

        .product-img2:hover {
            filter: brightness(150%);
        }

        .product-img2 {
            float: left;
            height: 100%;
            max-width: 654px;
            display: flex;
            align-items: center;
            transition: all 0.27s ease-in-out;
        }

        .product-img2 img {
            border-radius: 14px;
        }


        .product-img img {
            border-radius: 7px 0 0 7px;
        }

        .product-info {
            float: left;
            height: 420px;
            width: 327px;
            border-radius: 0 7px 10px 7px;
            background-color: #ffffff;
        }

        .product-text {
            height: 300px;
            width: 327px;
        }

        .a1 {
            padding: 0px;
            width: 125.25px !important;
            height: 84px !important;
            display: inline-block;
        }

        .whitespace-nowrap2 .a2 {
            width: 100.25px !important;
            height: 80px !important;
        }

        .whitespace-nowrap2 {
            padding: 0px;
            max-width: 44px;
            height: 100%;
            margin: 0px;
            justify-content: center;
        }


        .a2 {
            padding: 0px;
            width: 125.25px !important;
            height: 84px !important;
            display: inline-block;
        }


        .product-text h1 {
            margin: 0 0 0 38px;
            padding-top: 52px;
            font-size: 26px;
            color: #474747;
        }

        .product-text h1,
        .product-price-btn p {
            font-family: 'Press Start 2P';
        }

        .product-text h2 {
            margin: 0 0 47px 38px;
            font-size: 13px;
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            text-transform: uppercase;
            color: #d2d2d2;
            letter-spacing: 0.2em;
        }

        .product-text p {
            margin: 0 0 0 38px;
            font-family: 'Playfair Display', serif;
            color: #8d8d8d;
            font-size: 15px;
            font-weight: lighter;
            overflow: hidden;
        }

        .product-price-btn {
            margin-top: 32px;
            display: flex;
            justify-content: space-around;
        }

        .product-price-btn p {
            display: inline-block;
            position: absolute;
            top: -13px;
            height: 50px;
            font-family: 'Trocchi', serif;
            font-size: 28px;
            font-weight: lighter;
            color: #474747;
        }

        span {
            font-family: 'Suranna', serif;
            font-size: 25px;
        }

        .product-price-btn button {
            /* float: right; */
            display: inline-block;
            height: 50px;
            max-width: 166px;
            /* margin: 0 40px 0 16px; */
            box-sizing: border-box;
            border: transparent;
            border-radius: 60px;
            font-family: 'Raleway', sans-serif;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #ffffff;
            background-color: #9cebd5;
            cursor: pointer;
            outline: none;
        }

        .product-price-btn button:hover {
            background-color: #79b0a1;
            color: black;
        }

        .A {
            padding: 15px;
            margin: 10px 10px !important;
            border: 2px solid #3f3f6c;
            background-color: #6b6ba3;
            border-radius: 15px;
        }

        .A {
            width: 100%;
            display: inline-block;
        }



        .overflow-hidden {
            background-color: none;
        }


        .maintable {
            padding-top: 10px;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.5);
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 6px;
            overflow: hidden;
            font-family: 'Nohemi';
        }

        .maintable {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .maintable td {
            border-radius: 5px;
        }

        .maintable th {
            background-color: rgba(255, 255, 255, 0.6);
            border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        }

        .maintable th {
            border-radius: 5px;
        }

        .maintable td {
            padding: 10px;
            text-align: center;
            padding: 8px 12px;
        }

        .maindiv {
            display: flex;
        }

        body {
            font-family: sans-serif;
            background: linear-gradient(#6495ED, #5D3FD3) !important;
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            height: 100vh;
        }
    </style>

    </html>
    <div class="non-printable">

        <?php include 'footer.php'; ?>
    </div>
<?php } else {
    $tempchecker = true;

    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Not Authorized',
                showConfirmButton: false
            });

            setTimeout(function () {
                window.location.href = "Login.php";
            }, 2500);
        });
    </script>
    <style>
        .non-printable,
        .print-container {
            filter: blur(5px);
        }
    </style>

    <?php
}
?>