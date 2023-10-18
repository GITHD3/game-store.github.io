<?php session_start(); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/heroicons/2.4.0/dist/heroicons.min.js"></script>

<?php include 'navbar.php'; ?>

<div class="flex">


    <div class="w-full ml-16">
        <div class="text-center container py-3 pt-4">
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

                tr {
                    transition: all ease 0.8s;
                }

                tr:nth-child(even) {
                    background-color: rgba(255, 255, 255, 0.6);
                }

                tr:nth-child(odd) {
                    background-color: rgba(255, 255, 255, 0.4);
                }

                tr:hover a {

                    color: #F5F5DC !important;
                }

                tr:hover td {
                    background-color: rgba(106, 90, 205, 0.5);

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
                #cardadmin {
                    background-color: rgba(106, 90, 205, 0.9) !important;
                    border-radius: 5px;
                    border:2px solid Black; 
                }

                .linkpages {
                    background-color:#0C97FA;
                    font-size: 18px;
                    text-decoration: none;
                    transition: background-color 0.2s;
                }

                .linkpages:hover {
                    color: white;
                    background-color: slateblue;
                }
            </style>

            <div id="cardadmin" class="card max-w-xs mx-auto text-center">
                <div class="list-group list-group-flush" id="links">
                    <a class="linkpages block list-group-item py-2 px-4" href="admin1.php">Customer Details</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="admin2.php">Game Details</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="AdGamesAdd.php">Create Game</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="adGame.php">Update Game</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="deletegame.php">Delete Game</a>
                    <a class="linkpages block list-group-item py-2 px-4" href="category.php">Category</a>
                </div>
            </div>


            
            <center>
                <h1 class="py-3 pt-4">Customer Details</h1>
            </center> 
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
                        <?= $customer['customerid']; ?>
                    </a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>">
                        <?= $customer['firstname']; ?>
                    </a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>">
                        <?= $customer['lastname']; ?>
                    </a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>">
                        <?= $customer['emailaddress']; ?>
                    </a></td>
                <td> <a href="admincustomer.php?customerid=<?= $customer['customerid']; ?>">
                        <?= $customer['contactno']; ?>
                    </a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

</body>

</html>

<?php include 'footer.php'; ?>