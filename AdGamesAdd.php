<?php
session_start();

include 'navbar.php';
?>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
<div class="text-center container py-5">
    <h4 class="heading" style="
    font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game Store</strong></h4>
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

// Add game form validation and insertion
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gameName = $_POST['gameName'];
    $releaseDate = $_POST['releaseDate'];
    $genre = $_POST['genre'];
    // Validate form fields
    if (empty($gameName) || empty($releaseDate) || empty($genre)) {
        $error = 'All fields are required.';
    } else {
        // Insert game into the database
        try {
            // Get values from the form
            $gameid = $_POST['gameid'];
            $developerName = $_POST['developerName'];
            $publisherName = $_POST['publisherName'];
            $price = $_POST['price'];
            $gameSize = $_POST['gameSize'];
            $gameType = $_POST['gameType'];
            $description = $_POST['description'];
            $mini_description = $_POST['mini_description'];
            $memoryRequired = $_POST['memoryRequired'];
            $operatingSystem = $_POST['operatingSystem'];
            $processorRequired = $_POST['processorRequired'];
            $storageRequired = $_POST['storageRequired'];

            // Insert game into the database
            $insertQuery = "INSERT INTO games (gameid,gamename, developer_name, publisher_name, price, genre_name, gamesize, gametype, description,mini_description, memory_required, operating_system, processor_required, storage_required, release_date) 
            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";
            $stmt = $pdo->prepare($insertQuery);
            $stmt->execute([$gameid, $gameName, $developerName, $publisherName, $price, $genre, $gameSize, $gameType, $description, $mini_description, $memoryRequired, $operatingSystem, $processorRequired, $storageRequired, $releaseDate]);

            // Redirect to the game page or display a success message
            echo "<br><pre>Added</pre>";
        } catch (PDOException $e) {
            $error = 'Error inserting game: In Query';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

    <title>Admin Page</title>
    <style>
        body {
            background: linear-gradient(#404ccc, #03e9f4);
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100% !important ;
            padding: 5px 7px !important;
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

        h2,
        form {

            padding-left: 19px;

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

        input {
            border-radius: 4px;
            border: 2px solid white;
            padding-left: 19px;

        }

        label {
            padding-left: 19px;

            padding-right: 5px;
        }

        .inputs {
            padding-left: 19px;
        }

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
            padding-left: 19px;
        }

        @media (min-width:500px) {
            .priamrykeyupdates {
                padding-left: 42px;
                padding-top: 2px;
                padding-bottom: 2px;

            }
        }
    </style>
</head>

<body>
    <h1>Admin Page</h1>
    <div class="e">


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

        <h2>Add Game</h2>
        <form method="POST" action="">
            <div class="priamrykeyupdates">
                <pre><?php
                try {
                    $query_nuna = "SELECT MAX(gameid) AS last_nuna_gameid FROM games WHERE gameid LIKE 'NUNA__%'";
                    $stmt_nuna = $pdo->query($query_nuna);
                    $result_nuna = $stmt_nuna->fetch(PDO::FETCH_ASSOC);
                    $lastNunaGameID = $result_nuna['last_nuna_gameid'];
                } catch (PDOException $e) {
                    die("Error fetching last NUNA__ game ID: " . $e->getMessage());
                }

                try {
                    $query_una = "SELECT MAX(gameid) AS last_una_gameid FROM games WHERE gameid LIKE 'UNA__%'";
                    $stmt_una = $pdo->query($query_una);
                    $result_una = $stmt_una->fetch(PDO::FETCH_ASSOC);
                    $lastUnaGameID = $result_una['last_una_gameid'];
                } catch (PDOException $e) {
                    die("Error fetching last UNA__ game ID: " . $e->getMessage());
                }

                try {
                    $query_nua = "SELECT MAX(gameid) AS last_nua_gameid FROM games WHERE gameid LIKE 'NUA__%'";
                    $stmt_nua = $pdo->query($query_nua);
                    $result_nua = $stmt_nua->fetch(PDO::FETCH_ASSOC);
                    $lastNuaGameID = $result_nua['last_nua_gameid'];
                } catch (PDOException $e) {
                    die("Error fetching last NUA__ game ID: " . $e->getMessage());
                }

                echo "Last NUNA__ Game ID: " . $lastNunaGameID . "<br>";
                echo "Last UNA__ Game ID: " . $lastUnaGameID . "<br>";
                echo "Last NUA__ Game ID: " . $lastNuaGameID . "<br>";
                ?></pre>

            </div>
            <div class="inputs">
                <label for="gameid">Game ID:</label>
                <input type="text" id="gameid" name="gameid" required>
                <div></div><br>
                <label for="gameName">Game Name:</label>
                <input type="text" id="gameName" name="gameName" required>
                <div></div><br>
                <label for="developerName">Developer Name:</label>
                <input type="text" id="developerName" name="developerName" required>
                <div></div><br>
                <label for="publisherName">Publisher Name:</label>
                <input type="text" id="publisherName" name="publisherName" required>
                <div></div><br>
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
                <div></div><br>
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
                <div></div><br>
                <label for="gameSize">Game Size:</label>
                <input type="text" id="gameSize" name="gameSize" required>
                <div></div><br>
                <label for="gameType">Game Type:</label>
                <input type="text" id="gameType" name="gameType" required>
                <div></div><br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <div></div><br>
                <label for="mini_description">Mini - Description:</label>
                <textarea id="mini_description" name="mini_description" required></textarea>
                <div></div><br>
                <label for="memoryRequired">Memory Required:</label>
                <input type="number" id="memoryRequired" name="memoryRequired" required>
                <div></div><br>
                <label for="operatingSystem">Operating System:</label>
                <input type="text" id="operatingSystem" name="operatingSystem" required>
                <div></div><br>
                <label for="processorRequired">Processor Required:</label>
                <input type="text" id="processorRequired" name="processorRequired" required>
                <div></div><br>
                <label for="storageRequired">Storage Required:</label>
                <input type="text" id="storageRequired" name="storageRequired" required>
                <div></div><br>
                <label for="releaseDate">Release Date:</label>
                <input type="date" id="releaseDate" name="releaseDate" required>
                <div></div><br>
                <button type="submit">Add Game</button>
            </div>
            <?php if (!empty($error)): ?>
                <p style="color: red;">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>
        </form>
</body>

</html>
<?php include 'footer.php'; ?>