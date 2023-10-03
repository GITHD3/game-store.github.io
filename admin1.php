<?php session_start(); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/heroicons/2.4.0/dist/heroicons.min.js"></script>

<?php include 'navbar.php'; ?>

<div class="flex">
    <div style="width:6.5rem; margin-top:10px;"
        class="sidebard flex flex-col items-center pb-3 overflow-hidden text-indigo-300 bg-indigo-900 fixed right-0  rounded">
        <a class="flex items-center justify-center w-12 h-12 mt-2 rounded " href="admin1.php ">
                <h6>Customer</h6>

        </a>
        <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-indigo-700" href="#">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 6.414V16a1 1 0 11-2 0V6.414L3.707 10.707a1 1 0 01-1.414-1.414l6-6z" />
            </svg>
        </a>
        <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-indigo-700" href="#">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M6 1h9a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V3a2 2 0 012-2zm5 18a1 1 0 100-2 1 1 0 000 2zm-3-4a1 1 0 100-2 1 1 0 000 2zm0-4a1 1 0 100-2 1 1 0 000 2zm0-4a1 1 0 100-2 1 1 0 000 2z" />
            </svg>
        </a>
        <a class="flex items-center justify-center w-12 h-12 text-indigo-100 bg-indigo-700 rounded" href="#">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16zm1-8h4v2h-4v-2z" />
            </svg>
        </a>
        <a class="flex items-center justify-center w-12 h-12 rounded hover:bg-indigo-700" href="#">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M14 7h2v2h-2zM14 11h2v2h-2zM14 15h2v2h-2zM10 7h2v2h-2zM10 11h2v2h-2zM10 15h2v2h-2zM6 7h2v2H6zM6 11h2v2H6zM6 15h2v2H6z" />
            </svg>
        </a>
    </div>

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
                    padding: 5px 7px !important;
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
                    width: 90%;
                    border-collapse: collapse;
                    border: 2px solid white;
                    margin-top: 13px;
                }

                th,
                td {
                    border: 2px solid white;
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
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
            <center>
                <h1>Customer Details</h1>
            </center>
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
            </style>
            <!-- <div id="cardadmin2">
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
            </div> -->
            <br>
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
                        <td>
                            <?= $customer['customerid']; ?>
                        </td>
                        <td>
                            <?= $customer['firstname']; ?>
                        </td>
                        <td>
                            <?= $customer['lastname']; ?>
                        </td>
                        <td>
                            <?= $customer['emailaddress']; ?>
                        </td>

                        <td>
                            <?= $customer['contactno']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
    </div>
</div>

</body>

</html>

<?php include 'footer.php'; ?>