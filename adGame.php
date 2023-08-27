<?php
session_start();

include 'navbar.php';
?>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
<div class="text-center container py-5">
    <h4 class="heading" style="font-family: 'Press Start 2P'; font-size: 22px; color: black;"><strong>ParaCrash Game
            Store</strong></h4>
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

// Fetch game details from the games table
try {
    $query = "SELECT * FROM games";
    $stmt = $pdo->query($query);
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching game details: " . $e->getMessage());
}

if (isset($_POST['select_game'])) {
    $gameid = $_POST['gameid'];

    // Fetch the selected game details
    try {
        $query = "SELECT * FROM games WHERE gameid = :gameid";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':gameid', $gameid);
        $stmt->execute();
        $selectedGame = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching selected game details: " . $e->getMessage());
    }
}

if (isset($_POST['update'])) {
    // Update the game details
    $gameid = $_POST['gameid'];
    $gamename = $_POST['gamename'];
    $publisher_name = $_POST['publisher_name'];
    $developer_name = $_POST['developer_name'];
    $gamesize = $_POST['gamesize'];
    $genre_name = $_POST['genre_name'];
    $price = $_POST['price'];
    $mature_content = $_POST['mature_content'];
    $gametype = $_POST['gametype'];
    $description = $_POST['description'];
    $mini_description = $_POST['mini_description'];
    $memory_required = $_POST['memory_required'];
    $operating_system = $_POST['operating_system'];
    $processor_required = $_POST['processor_required'];
    $storage_required = $_POST['storage_required'];
    $release_date = $_POST['release_date'];

    // Prepare the update statement
    $stmt = $pdo->prepare("UPDATE games SET gamename=?, publisher_name=?, developer_name=?, gamesize=?, genre_name=?, price=?, mature_content=?, gametype=?, description=?,mini_description=?,memory_required=?, operating_system=?, processor_required=?, storage_required=?, release_date=? WHERE gameid=?");

    // Execute the update statement
    $stmt->execute([$gamename, $publisher_name, $developer_name, $gamesize, $genre_name, $price, $mature_content, $gametype, $description, $mini_description ,$memory_required, $operating_system, $processor_required, $storage_required, $release_date, $gameid]);

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo '<script>alert("Update Done");</script>';
        header("Location: adGame.php");
        exit;
    } else {
        echo '<script>alert("Error updating game details. Please try again.");</script>';
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
    <title>Change Games Details</title>
    <style>
        body {
            background: linear-gradient(#404ccc, #03e9f4);
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            padding: 5px 7px !important;
            height: 100% !important;
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
            padding-left: 16px;
        }

        /* Media queries for responsive layout */
        @media (max-width: 576px) {
            .index {
                display: flex;
                flex-direction: column;
                padding-right: 10px;
            }

            .index2 {
                padding-right: 10px;

            }
        }

        @media (min-width: 577px) {
            .index {
                display: flex;
                flex-direction: row;
                padding-right: 5px;
            }

            .index2 {

                padding-right: 5px;
            }
        }

        #sel {
            margin-top: 2px;
            background-color: rgba(30, 144, 255, 0.4);
            border: 2px solid white;
            border-radius: 13px;
            color: whitesmoke;
            font-style: bold;
            text-align: center;
            padding: 7px;
            max-width: 100px;
            font-size: 18px;
            transition: 0.4s;
        }

        #sel:hover {
            background-color: dodgerblue;
            border: 2px solid white;
            border-radius: 13px;
            color: whitesmoke;
            
            font-style: bold;
            text-align: center;
            padding: 7px;
            max-width: 100px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div id="cardadmin2">
        <div class="card" id="cardadmin" style="width: 17rem;">
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
    </div><br>
    <form class="index2" method="post" action="" style="padding-left: 16px;">
        <div class="mb-3">
            <label for="gameid" class="form-label">Select a game to update:</label>
            <select name="gameid" id="gameid" class="form-select" required>
                <option value="">Select a game</option>
                <?php foreach ($games as $game): ?>
                    <option value="<?= $game['gameid'] ?>"><?= $game['gamename'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="select_game" id="sel" class="Select btn btn-primary">Select</button>
    </form>
    <?php if (isset($selectedGame)): ?>
        <h2 style="padding-left: 16px;">Update Game:
            <?= $selectedGame['gamename'] ?>
        </h2>
        <form method="post" action="" style="padding-left: 16px; ">
            <input type="hidden" name="gameid" value="<?= $selectedGame['gameid'] ?>">
            <div class="row mb-3 index">
                <div class="col">
                    <label for="gamename" class="form-label">Game Name:</label>
                    <input type="text" name="gamename" id="gamename" class="form-control"
                        value="<?= $selectedGame['gamename'] ?>" required>
                </div>
                <div class="col">
                    <label for="publisher_name" class="form-label">Publisher Name:</label>
                    <input type="text" name="publisher_name" id="publisher_name" class="form-control"
                        value="<?= $selectedGame['publisher_name'] ?>" required>
                </div>
                <div class="col">
                    <label for="developer_name" class="form-label">Developer Name:</label>
                    <input type="text" name="developer_name" id="developer_name" class="form-control"
                        value="<?= $selectedGame['developer_name'] ?>" required>
                </div>
                <div class="col">
                    <label for="gamesize" class="form-label">Game Size:</label>
                    <input type="text" name="gamesize" id="gamesize" class="form-control"
                        value="<?= $selectedGame['gamesize'] ?>" required>
                </div>
            </div>
            <div class="row mb-3  index">
                <div class="col">
                    <label for="genre_name" class="form-label">Genre:</label>
                    <input type="text" name="genre_name" id="genre_name" class="form-control"
                        value="<?= $selectedGame['genre_name'] ?>" required>
                </div>
                <div class="col">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?= $selectedGame['price'] ?>"
                        required>
                </div>
                <div class="col">
                    <label for="mature_content" class="form-label">Mature Content:</label>
                    <input type="text" name="mature_content" id="mature_content" class="form-control"
                        value="<?= $selectedGame['mature_content'] ?>" required>
                </div>
                <div class="col">
                    <label for="gametype" class="form-label">Game Type:</label>
                    <input type="text" name="gametype" id="gametype" class="form-control"
                        value="<?= $selectedGame['gametype'] ?>" required>
                </div>
            </div>
            <div class="row mb-3 index">
                <div class="col">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" name="description" id="description" class="form-control"
                        value="<?= $selectedGame['description'] ?>" required>
                </div>
                <div class="col">
                    <label for="memory_required" class="form-label">Memory Required:</label>
                    <input type="text" name="memory_required" id="memory_required" class="form-control"
                        value="<?= $selectedGame['memory_required'] ?>" required>
                </div>
                <div class="col">
                    <label for="operating_system" class="form-label">Operating System:</label>
                    <input type="text" name="operating_system" id="operating_system" class="form-control"
                        value="<?= $selectedGame['operating_system'] ?>" required>
                </div>
                <div class="col">
                    <label for="processor_required" class="form-label">Processor Required:</label>
                    <input type="text" name="processor_required" id="processor_required" class="form-control"
                        value="<?= $selectedGame['processor_required'] ?>" required>
                </div>
            </div>
            <div class="row mb-3 index">
                <div class="col">
                    <label for="storage_required" class="form-label">Storage Required:</label>
                    <input type="text" name="storage_required" id="storage_required" class="form-control"
                        value="<?= $selectedGame['storage_required'] ?>" required>
                </div>
                <div class="col">
                    <label for="release_date" class="form-label">Release Date:</label>
                    <input type="text" name="release_date" id="release_date" class="form-control"
                        value="<?= $selectedGame['release_date'] ?>" required>
                </div>
                <div class="col">
                    <label for="mini_description" class="form-label">Mini Description:</label>
                    <input type="text" name="mini_description" id="mini_description" class="form-control"
                        value="<?= $selectedGame['mini_description'] ?>" required>
                </div>
            </div>
            <button type="submit" name="update" id="sel" class="Select btn btn-primary">Update</button>
        </form>
    <?php endif; ?>
</body>

</html><?php include 'footer.php'; ?>