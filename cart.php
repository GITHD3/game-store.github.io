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
    <?php } else { ?>
        <div class="container main">
            <div class="A">

                <h4 class="heading pt-2" style="font-family: 'Press Start 2P'; font-size: 22px;  color: #dfdfdf;">
                    <strong><br>Cart</strong>
                </h4>
            </div>

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