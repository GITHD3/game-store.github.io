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
    }, 3500); 
  </script>
  </script>
        <?php
    } else {
        $cartvar = $_SESSION['id'];
        $sql = "SELECT cartid, gameid, amount FROM cart WHERE cartid = $cartvar";
        $result = $dbconn->query($sql);
        $cart_items = array();

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $gameId = $row['gameid'];
                $sql2 = "SELECT gamename FROM games WHERE gameid = ?";
                $stmt2 = $dbconn->prepare($sql2);
                $stmt2->execute([$gameId]);
                $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                $gameName = $result2['gamename'];
                $cart_items[] = [
                    'gameid' => $row['gameid'],
                    'amount' => $row['amount'],
                    'gameName' => $gameName
                ];

                $gameidtemp = $row['gameid'];
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
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h4 class="heading"
                                    style="font-family: 'Press Start 2P'; font-size: 20px; color:slateblue;">
                                    <strong>Cart </strong>-
                                    <?php echo count($cart_items); ?> items
                                </h4>
                            </div>
                            <div class="card-body">
                                <?php foreach ($cart_items as $item) {
                                    $gameName = $item['gameName'];
                                    $amount = $item['amount'];
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                <img src="img/<?php echo $gameName; ?>.webp" class="w-100"
                                                    alt="<?php echo $gameName; ?>" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <p><strong>
                                                    <?php echo $gameName; ?>
                                                </strong></p>
                                            <p>Price:
                                                <?php echo $amount; ?>
                                            </p>
                                            <form class="deletecart" method="POST">
                                                <input type="hidden" name="gameid" data-gameid="<?php echo $item['gameid']; ?>" value="<?php echo $item['gameid']; ?>">
                                                <button type="submit" name="deletecart"
                                                    class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                                    title="Remove item">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <p class="text-start text-md-center">
                                                <strong>$
                                                    <?php echo $amount; ?>
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                   if(isset($_POST['deletecart'])){
                                    $gameidToDelete = $_POST['gameid'];
                                    $q = "DELETE FROM `cart` WHERE gameid = '$gameidToDelete'";
                                    $resultsecond = $dbconn->query($q);
                                }
                                
                                    ?>
                                <?php } ?>
                                <script>
    $(document).ready(function () {
        $('.delete-item').click(function () {
            var gameid = $(this).parent().data('gameid');
            $.ajax({
                type: 'POST',
                url: '',
                data: {
                    'deletecart': true,
                    'gameid': gameid
                },
                success: function (response) {
                    
                }
            });
        });
    });
</script>

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
                                        <span>$
                                            <?php echo array_sum(array_column($cart_items, 'amount')); ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Shipping
                                        <span>-</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                        </div>
                                        <span><strong>$
                                                <?php echo array_sum(array_column($cart_items, 'amount')); ?>
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
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100% !important;
    }
    footer {
        position: fixed !important;
    }
    .card-body {
        gap: 30px;
        display: grid;
    }
</style>

</html>
<?php } include 'footer.php'; ?>
