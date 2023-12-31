<?php
session_start();
?>

<?php
include 'navbar.php';
?>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>

<div class="text-center container py-3 pt-4">
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

// Fetch game details from the games table
try {
    $query = "SELECT * FROM games";
    $stmt = $pdo->query($query);
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching game details: " . $e->getMessage());
}

if (isset($_POST['show_game'])) {
    $gamename = $_POST['GAMENAME'];
    try {
        $query = "SELECT * FROM games WHERE gamename = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$gamename]);
        $show_game = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching selected game details: " . $e->getMessage());
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

    <title class="f">Admin Page - Game Show</title>
    <style>
        body {
            background-image: linear-gradient(#146aa7, #48aaadb0);
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
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
            width: 90%;
            border-collapse: collapse;
            border: 2px solid white;
            margin-top: 13px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid gray;
        }

        .hd {
            font-size: 10px;
        }

        h1 {
            padding-left: 19px;
        }
    </style>
</head>

<body>
    <style>
        #cardadmin {
            background-color: rgba(106, 90, 205, 0.9) !important;
            border-radius: 5px;
            border: 2px solid Black;
        }

        .linkpages {
            background-color: #0C97FA;
            font-size: 18px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .linkpages:hover {
            color: white;
            background-color: slateblue;
        }

        .slat{
            width: fit-content;
        }
    </style>

    <div id="cardadmin" class="card max-w-xs mb-5 mx-auto text-center">
        <div class="list-group list-group-flush" id="links">
            <a class="linkpages block list-group-item py-2 px-4" href="admin1.php">Customer Details</a>
            <a class="linkpages block list-group-item py-2 px-4" href="admin2.php">Game Details</a>
            <a class="linkpages block list-group-item py-2 px-4" href="AdGamesAdd.php">Create Game</a>
            <a class="linkpages block list-group-item py-2 px-4" href="deactivate.php">Deactivate Game</a>
            <a class="linkpages block list-group-item py-2 px-4" href="adGame.php">Update Game</a>
            <a class="linkpages block list-group-item py-2 px-4" href="category.php">Category</a>
            <a class="linkpages block list-group-item py-2 px-4" href="admin_news.php">News</a>

        </div>
    </div>
    <form method="post" action="">
        <div class="mb-3 pb-10 slat ">

            <select name="GAMENAME" id="GAMENAME" class="form-select" required>
                <option value="">Select a game</option>
                <?php foreach ($games as $game): ?>
                    <option value="<?= $game['gamename'] ?>">
                        <?= $game['gamename'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="show_game" id="select" class="btn btn-primary">Select</button>
        </div>
    </form>
    <?php if (isset($show_game)): ?>
        <h2 class="heading">Display Game:
            <?= $show_game['gamename'] ?>
        </h2>
        <div class="tablediv">
            <table>

                <tr>
                    <td>
                        <p class="statLine"><b>ID :</b>
                            <?= $show_game['gameid'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Game Name : </b>
                            <?= $show_game['gamename'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Publisher Name : </b>
                            <?= $show_game['publisher_name'] ?>
                        </p>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <p class="statLine"><b>Developer Name : </b>
                            <?= $show_game['developer_name'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Game Size : </b>
                            <?= $show_game['gamesize'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Genre : </b>
                            <?= $show_game['genre_name'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Price :</b>
                            <?= $show_game['price'] ?>
                        </p>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <p class="statLine"><b>Description : </b>
                            <?= $show_game['description'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Memory Required : </b>
                            <?= $show_game['memory_required'] ?>
                        </p>
                    </td>
                </tr>

            </table>
            <table>
                <tr>
                    <td>
                        <p class="statLine"><b>Mini - Description : </b>
                            <?= $show_game['mini_description'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Operating System : </b>
                            <?= $show_game['operating_system'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Processor Required : </b>
                            <?= $show_game['processor_required'] ?>
                        </p>
                    </td>
                    <td>
                        <p class="statLine"><b>Storage Required : </b>
                            <?= $show_game['storage_required'] ?>
                        </p>
                    </td>
                </tr>

            </table>

        <?php endif; ?>
    </div>
</body>
<style>
    .heading,
    form {
        padding-left: 20px;
    }

    #GAMENAME {
        padding: 7px;
        min-width: 40%;
    }

    #select {
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

    #select:hover {
        background-color: dodgerblue;
        border: 2px solid white;
        border-radius: 13px;
        color: whitesmoke;
        ;
        font-style: bold;
        text-align: center;
        padding: 7px;
        max-width: 100px;
        font-size: 18px;
    }

    table {
        background-color: whitesmoke;
        color: darkslategrey;
        padding-top: 5px;
        padding-bottom: 5px;
        max-width: 90%;
        min-width: 20%;
        border-style: solid;
        border-color: #1663be;
    }



    td {
        min-width: 20%;
    }

    .statLine {
        font-size: 20px;

    }

    .tablediv {
        margin-bottom: 150px;
    }
</style>



</html>
<div class=" " style="position: fixed; bottom: 0; left: 0; right: 0;">
    <?php include 'footer.php'; ?>
</div>