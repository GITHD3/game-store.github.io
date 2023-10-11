<?php session_start(); ?>


<?php include 'navbar.php'; ?>

<div class="flex">


    <div class="w-full ml-16">
        <div class="text-center container py-5">
            <h4 class="heading" style="font-family: 'Press Start 2P'; font-size: 22px; color:black;">
                <strong>ParaCrash Game Store</strong>
            </h4>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
        </div>

        <?php
        // Check if the admin is authenticated
        
        // Database connection configuration
        $dsn = 'mysql:host=localhost;dbname=game4';
        $username = 'root';
        $password = '';

        // Create a PDO instance
        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Try After Sometime ");
        }


        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
            <title>Customer Bill Details</title>
            <style>
                .sb {
                    justify-self: center;
                    height: 100vh;
                }

                body {
                    background-image: linear-gradient(slateblue, #0C97FA);
                    background-repeat: no-repeat !important;
                    background-attachment: fixed !important;
                    background-size: cover !important;
                    height: 100% !important;
                }

               
                .btn {
                    padding-left: 19px;
                    font-size: 16px;
                    transition-duration: 0.4s;
                    border: 3px solid black;
                }

                .btn:hover {
                    background-color: black;
                    color: white;
                    border: 3px solid White;
                }

                table {
                    margin: auto;
                    width: 98%;
                    margin-bottom: 20px;
                    border-collapse: collapse;
                    margin-top: 13px;
                    /* border-radius: 0px 0px 20px 20px; */
                    background-color: rgba(255, 255, 255, 0.4);
                }

                th,
                td {
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                    padding: 15px;
                }

                th {
                    border: 1px solid white;
                    background-color: #4a5568;
                    color: white;
                }

                tr:nth-child(even) {
                    background-color: rgba(255, 255, 255, 0.6);
                }

                tr:nth-child(odd) {
                    background-color: rgba(255, 255, 255, 0.4);
                }

                tr:hover td {
                    background-color: rgba(106, 90, 205, 0.5);
                    color: #F5F5DC;
                }

                h1 {
                    padding-left: 19px;
                }

                .btn2 {
                    background-color: rgba(255, 255, 255, 0.4);
                    color: black;
                    border: none;
                    border-radius: 7px;
                    padding: 14px;
                    width: 100%;
                    max-width: 150px;
                    font-size: 20px;
                }

                .btn2:hover {
                    background-color: rgba(255, 255, 255, 0.2);
                    color: black;
                }

                .a {
                    margin: auto;
                    text-align: center;
                    font-size: 24px;
                }

                .b {
                    margin-left: 15px;
                }

                .back {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .static {
                    bottom: 0;
                    position: fixed;
                    width: 100%;
                }
            </style>
        </head>

        <body>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
            <?php
            if (isset($_GET['customerid'])) {
                $customerid = $_GET['customerid'];
                $queyt = "select firstname from customer where customerid = $customerid;";
                $stmt = $pdo->query($queyt);
                $customer = $stmt->fetchColumn();
                $qy = "SELECT `bill_id`, `gameid`, `bill_date`, `amount` FROM `bill` WHERE customerID = $customerid";
                $stmt = $pdo->query($qy);
                $bill = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $recordCount = count($bill);
                ?>
                <div class="back flex">
                    <div class="b"><a href="admin1.php"><button class="btn2">Back</button> </a></div>
                    <div class="a text-center">
                        <h1>Bill Details -
                            <?php echo $customer; ?>
                        </h1>
                    </div>
                </div>
                <?php
                if ($recordCount > 0) {
                    ?>
                    <div>
                        <table>
                            <tr>
                                <th>Bill Id</th>
                                <th>Game Id</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            <?php foreach ($bill as $bills): ?>
                                <tr>
                                    <td>
                                        <?php echo $bills['bill_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $bills['gameid']; ?>
                                    </td>
                                    <td>
                                        <?php echo $bills['bill_date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $bills['amount']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4"> <!-- Use colspan to span all columns -->
                                    <h4 class="text-center">Total Game Purchased -
                                        <?php echo $recordCount; ?>
                                    </h4>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <?php
                } else {
                    echo "<center><h3>Customer not Purhcased Anything Yet!!</h3></center>";
                }
            } else {
                echo " 
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

                setTimeout(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href='login.php'>Unauthorized Access!!</a>'
                    });
                }, 3000); ";

            }

            ?>

        </body>

        </html>
            <?php include 'footer.php'; ?>