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

            $gameIds = array_column($cart_items, 'gameid');
            $sql2 = "SELECT gamename, price FROM games WHERE gameid = ?";
            $stmt2 = $dbconn->prepare($sql2);
            foreach ($gameIds as $gameId) {
                $stmt2->execute([$gameId]);
                $gameData = $stmt2->fetch(PDO::FETCH_ASSOC);

                foreach ($cart_items as &$item) {
                    if ($gameData['gameid'] == $item['gameid']) {
                        $item['gameName'] = $gameData['gamename'];
                        $item['gamePrice'] = $gameData['price'];
                        break;
                    }
                }
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

$queryforamount = "SELECT price FROM games WHERE gamename = ?";
$stmtPrice = $dbconn->prepare($queryforamount);
$stmtPrice->execute([$item['gameName']]);
$gameprice = $stmtPrice->fetchColumn();

?>
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                data-mdb-ripple-color="light">
                <img src="img/<?php echo isset($item['gameName']) ? $item['gameName'] : ''; ?>.webp" class="w-100"
                    alt="<?php echo isset($item['gameName']) ? $item['gameName'] : ''; ?>" />
                <a href="#!">
                    <div class="mask"
                        style="background-color: rgba(251, 251, 251, 0.2)">
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
            <p><strong>
                    <?php echo isset($item['gameName']) ? $item['gameName'] : ''; ?>
                </strong></p>

            <form class="deletecart" method="POST">
                <input type="hidden" name="gameid"
                    data-gameid="<?php echo isset($item['gameid']) ? $item['gameid'] : ''; ?>"
                    value="<?php echo isset($item['gameid']) ? $item['gameid'] : ''; ?>">
                <button type="submit" name="deletecart"
                    class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                    title="Remove item">
                    <i class="fas fa-trash"></i>
                </button>
            </form>

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
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Products
                                            <span>
                                                <?php
                                                $totalPrice = 0;
                                                foreach ($cart_items as $item) {
                                                    $totalPrice += $item['gamePrice'];
                                                }
                                                echo '&#8377;' . $totalPrice;
                                                ?>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            Discount
                                            <span>-</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>Total amount</strong>
                                            </div>
                                            <span><strong>
                                                    <?php
                                                    echo '&#8377;' . $totalPrice;
                                                    ?>
                                                </strong></span>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-primary btn-lg btn-block">
                                        Go to checkout
                                    </button>
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
            background-attachment: fixed!important;
            height: 100vh;
            padding: 5px 7px !important;
        }

        .card-body {
            gap: 30px;
            display: grid;
        }

        .card {
            transition: box-shadow 0.3s ease;
        }

        .hovered {
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
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
<div class="b-0">
    <?php include 'footer.php'; ?>
</div>
