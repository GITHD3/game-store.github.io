<?php
session_start();
// Check if the gameName session variable is set
if (isset($_GET['gameName'])) {
    $gameName = $_GET['gameName'];

} elseif (isset($_POST['gameName'])) {
    $gameName = $_POST['gameName'];
} else {
    echo "Error Occured";
    exit; // Stop execution if the gameName is not set
}

$host = "localhost";
$username = "root";
$db_password = "";
$database = "game4";

$conn = new PDO("mysql:host=$host;dbname=$database", $username, $db_password);


$stmt = $conn->prepare("SELECT `gameid`,`gamename`, `developer_name`, `publisher_name`, `genre_name`, `price`, `mature_content`, `gamesize`, `gametype`, `description`, 
`memory_required`, `operating_system`, `processor_required`, `storage_required`, `release_date` FROM `games` WHERE gamename = :tmp ");
$stmt->bindParam(":tmp", $gameName);
$stmt->execute();

$games = $stmt->fetch(PDO::FETCH_ASSOC);

if ($games) {
    $gameidtemp = $games['gameid'];
    $gamename = $games['gamename'];
    $dname = $games['developer_name'];
    $pname = $games['publisher_name'];
    $genre = $games['genre_name'];
    $price = $games['price'];
    $maturecontent = $games['mature_content'];
    $gamesize = $games['gamesize'];
    $gametype = $games['gametype'];
    $description = $games['description'];
    $memory_required = $games['memory_required'];
    $operating_system = $games['operating_system'];
    $processor_required = $games['processor_required'];
    $storage_required = $games['storage_required'];
    $release_date = $games['release_date'];
} else {
    echo "Game not found.";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Aspekta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Satoshi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nohemi' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <title>Seperate Page</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>


</head>


<body>
    <?php include 'navbar.php'; ?>
    <div class="text-center container py-5">
        <h4 class="heading" style="
    font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
    </DIV>
    <STYLE>
    body {
        background: linear-gradient(#404ccc, #03e9f4);
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100% !important;
        overflow-y: smooth;
    }

    /* Hide scrollbar */
    ::-webkit-scrollbar {
        display: none;
    }

    .card {
        max-width: 260px;
        display: inline-block;
    }
    .card2{
        display: table;
    }

    .scrolling-wrapper {
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
    }
    </STYLE>




    <style>
    .fakeimg1 {
        height: 200px;
        max-width: 210px;
        border-radius: 4px;
        border: 1px solid black;
    }

    .fakeimg {
        height: 200px;
        max-width: 200px;

    }

    #all {
        outline: rgb(255, 255, 159);
        outline-style: solid;
        border-radius: 4px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Nohemi', sans-serif;
    }

    p {
        font-family: 'satoshi', sans-serif;
    }

    .special {
        font-family: 'Aspekta', sans-serif;

        align-items: center;
    }

    #special2 {
        font-size: 22px;
    }

    #special3 {
        font-style: none;
        font-size: 19px;
    }

    #line1 {
        color: yellow;
    }

    .btn {
        text-align: center;
        background-color: black;
        color: beige;
        outline: 2px solid black;
        border-radius: 4px;
        transition: 0.5s;
        width: 146px;
    }

    .btn:hover {
        background-color: #33363D;
        border-radius: 7px;
        color: blanchedalmond;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }
    </style>




    <div class="container" id="all">
        <div class="row">
            <div class="col-sm-4">

                <br>
                <div class="card p-0 m-0">
                    <img class="fakeimg1" src="img/<?php echo $gameName; ?>.webp">
                </div>
                        <div class="card2 p-0 pt-2 m-0">
                <?php
                    $check_game_cart = "SELECT * FROM `cart` WHERE gameid = :gameid";
                                        $stmt_check_game_cart = $conn->prepare($check_game_cart);
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
                echo '
                <form class="formbutton" method="POST" id="add-to-cart-form">
                <input type="hidden" name="gameid" value="<?php echo $gameidtemp; ?>">
                <button type="submit" class="btn" name="add_to_cart" id="add-to-cart-button">Add to Cart</button>
            </form>
';
                if (isset($_POST['add_to_cart'])) {
                if (isset($_SESSION['id'])) {
                $cartid = $_SESSION['id'];

                $addquery = "INSERT INTO `cart`(`cartid`, `gameid`, `amount`) VALUES
                (:cartid, :gameid, 0)";

                $stmt = $conn->prepare($addquery);
                $stmt->bindParam(':cartid', $cartid);
                $stmt->bindParam(':gameid', $gameidtemp);

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
                                                }    }}
                                            ?>

                
                
                <form class="formbutton text-center p-0 m-0 pt-2" method="POST" action="seppage.php">
                                            <input type="hidden" value="<?php echo $game['gamename']; ?>" name="gameName">
                                            <button type="submit" class="btn">Buy</button>
                                        </form>
                </div>
                <br>
                <p>
                    <?php
                    if ($price == 0) {
                        echo "Free";
                    } else {
                        echo "Rs." . $price;
                    } ?>
                </p>
                <p>
                    <?php echo $genre; ?>
                </p>
                <hr class="hidden-sm hidden-md hidden-lg">
                <center>
                    <h5>SYSTEM REQUIREMENTS</h5>
                </center><br>
                <p>Game Size -
                    <?php echo $gamesize; ?>
                </p>
                <p>Minimum Storage Required -
                    <?php echo $storage_required; ?>
                </p>
                <p>Minimum RAM Required -
                    <?php echo $memory_required; ?>
                </p>
                <p>Operating System Required -
                    <?php echo $operating_system; ?>
                </p>
                <p>Processor Required -
                    <?php echo $processor_required; ?>
                </p>

                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8"><br>
                <center>
                    <h2 class="special">
                        <?php echo $gameName; ?>
                    </h2>
                </center>
                <hr id="line1">
                <br><br>
                <h5>Release Date -
                    <?php echo $release_date; ?>
                </h5>
                <h4>By
                    <?php echo $pname; ?>
                </h4>
                <h4>Developer -
                    <?php echo $dname; ?>
                </h4>
                <hr class="hidden-sm hidden-md hidden-lg">
                <br>
                <p id="special2">Description</p>
                <p id="special3">
                    <?php echo $description; ?>
                </p>
                <hr class="hidden-sm hidden-md hidden-lg">
                <!-- <div class="fakeimg">Fake Image</div>
                    <p>Some text..</p>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco.</p> -->
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-to-cart-button').click(function() {
            var gameidtemp = <?php echo json_encode($gameidtemp); ?>;
            $.ajax({
                type: "POST",
                url: "cart.php", // Replace with your PHP script handling the cart addition
                data: { gameid: gameidtemp },
                success: function(response) {
                    console.log(response); // Print the response for debugging
                    // Assuming response contains updated content in HTML format
                    $('#update-section').html(response); // Update the content on the page
                },
                error: function(xhr, status, error) {
                    console.log(error); // Log any error for debugging
                }
            });
        });
    });
</script>



</html>
<?php  include 'footer.php'; ?>
