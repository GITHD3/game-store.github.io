<?php
session_start();
include 'navbar.php';
$dsn = "mysql:host=localhost;dbname=game4";
$username = "root";
$password = "";
$dbconn = new PDO($dsn, $username, $password);
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$total = 0;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Cart Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="font-family: 'Aspekta', sans-serif;">
    <?php
    if (!isset($_SESSION['id'])) {
        ?>
        <script>
            Swal.fire({
                title: "Login Required",
                text: "To add an item to your cart, please login or sign up to start shopping and enjoy all the benefits.",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Login",
                cancelButtonText: "Sign Up",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = 'registration.php';
                }
            });

            setTimeout(function () {
                window.location.href = 'main1.php';
            }, 2300); 
        </script>
        <?php
    } else {
        $cartvar = $_SESSION['id'];
        $sql = "SELECT cartid, gameid FROM cart WHERE cartid = $cartvar";
        $stmt = $dbconn->query($sql);

        $cart_items = array();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $gameId = isset($row['gameid']) ? $row['gameid'] : '';
                $cart_items[] = [
                    'gameid' => $gameId
                ];
            }


        } else {
            ?>
            <script>
                Swal.fire({
                    icon: 'question',
                    title: 'Why Your Cart is Empty',
                    text: 'Simplify checkout, and boost sales by facilitating product selection and purchase.',
                    timer: 4000,
                    willClose: () => {
                        window.location.href = 'main1.php';
                    }
                });
            </script>
            <?php
        }
        ?>

        <div class="container main">
            <section class="gradient-custom display-flex g-9">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                            <div class="card mb-4 card1">
                                <div class="card-header py-3">
                                    <h4 class="heading"
                                        style="font-family: 'Press Start 2P'; font-size: 20px; color:slateblue;">
                                        <strong>Cart </strong>-
                                        <?php echo count($cart_items); ?> items
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php foreach ($cart_items as $item) {
                                        $tempvarid = " ";
                                        $tempvarid = $item['gameid'];
                                        $queryforamount = "SELECT price  FROM games WHERE gameid = ?";
                                        $queryforname = "SELECT gamename FROM games WHERE gameid = ?";
                                        $stmtPrice = $dbconn->prepare($queryforamount);
                                        $stmtname = $dbconn->prepare($queryforname);
                                        $stmtPrice->execute([$item['gameid']]);
                                        $stmtname->execute([$item['gameid']]);
                                        $gameprice = $stmtPrice->fetchColumn();
                                        $gameName = $stmtname->fetchColumn();
                                        $total += $gameprice;
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                    data-mdb-ripple-color="light">
                                                    <img src="img/<?php echo isset($gameName) ? $gameName : ''; ?>.webp"
                                                        class="w-100" alt="<?php echo isset($gameName) ? $gameName : ''; ?>" />
                                                    <a href="#!">
                                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                <p><strong>
                                                        <?php echo isset($gameName) ? $gameName : ''; ?>
                                                    </strong></p>

                                                <form class="deletecart" method="POST">
                                                    <input type="hidden" name="gameids" value="<?php echo $item['gameid']; ?>">
                                                    <button type="submit" name="delete" class="btn btn-primary btn-sm me-1 mb-2"
                                                        data-mdb-toggle="tooltip" title="Remove item">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                                <?php
                                                if (isset($_POST['delete'])) {
                                                    $gameid = $_POST['gameids'];
                                                    try {
                                                        $query = "DELETE FROM `cart` WHERE gameid = :gameid AND cartid = :cartid";
                                                        $stmt = $dbconn->prepare($query);
                                                        $stmt->bindParam(':gameid', $gameid, PDO::PARAM_STR);
                                                        $stmt->bindParam(':cartid', $cartvar, PDO::PARAM_INT);
                                                        $stmt->execute();
                                                    } catch (Exception $e) {
                                                        echo $e->getLine();
                                                        echo $e->getMessage();
                                                    }
                                                }
                                                ?>


                                            </div>
                                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                                <p class="text-start text-md-center">
                                                    <strong>&#8377;
                                                        <?php echo isset($gameprice) ? $gameprice : ''; ?>
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4 card2">
                                <div class="card-header py-3">
                                    <h5 class="mb-0">Summary</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Products
                                            <span>
                                                <?php

                                                echo '&#8377;' . $total;
                                                ?>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            Discount
                                            <span>-</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>Total amount</strong>
                                            </div>
                                            <span><strong>
                                                    <?php
                                                    echo '&#8377;' . $total;
                                                    ?>
                                                </strong></span>
                                        </li>
                                    </ul>
                                    <form action="bill.php" method="GET">
                                        <input type="hidden" name="cartid" value="<?php echo $cartvar; ?>">
                                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"
                                            name="checkoutButton">
                                            Go to checkout
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(#6495ED, #5D3FD3) !important;
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            height: 100vh;
        }

        .card-body {
            gap: 30px;
            display: grid;
        }

        .card {
            transition: box-shadow 0.3s ease;
        }

        .card1 {
            height: 100%;
        }

        .hovered {
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        }

        #checkoutButton {
            width: 100%;
            border-radius: 10px;
            background-color: #7e3fa5;
            border: none;
            transition: all 0.6s;
        }

        #checkoutButton:hover {
            border-radius: 12px;
            background-color: #603FEF;
        }
    </style>
    <script>

        $(document).ready(function () {
            $('.card1').hover(function () {
                $('.card2').toggleClass('hovered');
            });
            $('.card2').hover(function () {
                $('.card1').toggleClass('hovered');
            });
        });
    </script>

    </html>
<?php } ?>
<div class="b-0 p-0" style="position: absoulte; bottom: 0; left: 0; right: 0;">
    <?php include 'footer.php'; ?>
</div>
