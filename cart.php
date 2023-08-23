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
    <title>Cart Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="font-family: 'Aspekta', sans-serif;">
    <?php if (!isset($_SESSION['id'])) { ?>
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
            // Redirect to the login page
            window.location.href = 'login.php';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Redirect to the sign-up page
            window.location.href = 'registration.php';
        }
    });
    </script>
    <?php } else {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cartvar = $_SESSION['id'];
$sql = "SELECT cartid, gameid, amount
        FROM cart
        WHERE cartid = $cartvar";

$result = $conn->query($sql);
$cart_items = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $gameId = $row['gameid'];
        $sql2 = "SELECT gamename FROM games WHERE gameid = $gameId";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            $gameName = $row2['gamename'];
        } else {
            $gameName = "Unknown Game"; 
        }

        // Now you have $gameName for the current item
        // You can use $row and $gameName to display cart items
    }
}


?>

    <div class="container main">

        <section class="h-100 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h4 class="heading"
                                    style="font-family: 'Press Start 2P'; font-size: 20px;  color:slateblue;">
                                    <strong>Cart </strong>- <?php echo count($cart_items); ?> items
                                </h4>
                            </div>
                            <div class="card-body">
                                <?php foreach ($cart_items as $item) { ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="<?php echo $gameName; ?>.webp" class="w-100"
                                                alt="<?php echo $gameName; ?>" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <p><strong><?php echo $item['name']; ?></strong></p>
                                        <p>Color: <?php echo $item['color']; ?></p>
                                        <p>Size: <?php echo $item['size']; ?></p>
                                        <button type="button" class="btn btn-primary btn-sm me-1 mb-2"
                                            data-mdb-toggle="tooltip" title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm mb-2"
                                            data-mdb-toggle="tooltip" title="Move to the wish list">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <p class="text-start text-md-center">
                                            <strong>$<?php echo $item['amount']; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <?php } ?>

                                <!-- Rest of your template -->

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Products
                                        <span>$<?php echo array_sum(array_column($cart_items, 'amount')); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Shipping
                                        <span>Gratis</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                            <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong>
                                        </div>
                                        <span><strong>$<?php echo array_sum(array_column($cart_items, 'amount')); ?></strong></span>
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

        <?php } ?>
</body>

<style>
body {
    font-family: sans-serif;
    background: linear-gradient(#6495ED, #5D3FD3) !important;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100%;
}
</style>

</html>
<?php include 'footer.php'; ?>
