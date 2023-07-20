<?php session_start(); ?>



<?php include 'navbar.php'; ?>
<div class="text-center container py-5">
    <h4 class="heading" style="
    font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
</DIV>
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
    <title>Admin Page</title>
    <style>
        body {
            background-image: linear-gradient(#0C97FA, #16E1F5);
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100%;
            overflow: hidden;
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

<body><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

    <h1>Admin Page</h1>
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

            li  {
                color: darkslategrey;
            }

            .linkpages:hover {
                color: black;
            }

            #cardadmin2 {
                padding-left: 16px;
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
   
</body>


</html>