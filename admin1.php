<?php session_start(); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/heroicons/2.4.0/dist/heroicons.min.js"></script>

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
            die("Database connection failed: " . $e->getMessage());
        }

        // Fetch customer details from the customer table
        try {
            $query = "SELECT * FROM customer";
            $stmt = $pdo->query($query);
            $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching customer details: " . $e->getMessage());
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
            <title>Customer Details</title>
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

                @media (min-width:700px) {
                    body {
                        padding-bottom: 19px;
                    }
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
                    padding-bottom: 13px;
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
                    color: #F5F5DC !important;
                }

                h1 {
                    padding-left: 19px;
                }
            </style>
        </head>

        <body>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

            <style>
                .card-header,
                .linkpages:link {
                    text-decoration: none;
                    font-size: 18px;
                }

                .card-header {
                    color: black;
                    background-color: #DEB887;
                }

                li {
                    color: darkslategrey;
                }

                .linkpages:hover {
                    color: black;
                }

                #cardadmin2 {
                    padding-left: 16px;
                }
                a{
                    color:black;
                    text-decoration: none;
                    cursor: pointer;
                }
            </style>
            <div id="cardadmin2">
                <div class="card " id="cardadmin" style="width: 17rem;">
                    <div class="card-header">
                        Admin:
                    </div>
                    <ul class="list-group list-group-flush" id="links">
                        <a class="linkpages" href="admin1.php">
                            <li class="list-group-item">Customer Details</li>
                        </a>
                        <a class="linkpages" href="admin2.php">
                            <li class="list-group-item">Game Details</li>
                        </a>
                        <a class="linkpages" href="AdGamesAdd.php">
                            <li class="list-group-item">Create Game</li>
                        </a>
                        <a class="linkpages" href="adGame.php">
                            <li class="list-group-item">Update Game</li>
                        </a>
                        <a class="linkpages" href="deletegame.php">
                            <li class="list-group-item">Delete Game</li>
                        </a>
                    </ul>
                </div>
            </div>
            <br>
            <center>
                <h1>Customer Details</h1>
            </center> <br>
    </div>
</div>
<div>
<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Contact No</th>
    </tr>
    <?php foreach ($customers as $customer): ?>
            <tr>
                <td><a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>">
                <?= $customer['customerid']; ?></a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>"><?= $customer['firstname']; ?></a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>"><?= $customer['lastname']; ?></a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>"><?= $customer['emailaddress']; ?></a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>"><?= $customer['contactno']; ?></a></td>
            </tr>
    <?php endforeach; ?>
</table>

        </div>
        
    </body>

</html>

<?php include 'footer.php'; ?>