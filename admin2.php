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

<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

    <title class="f">Admin Page</title>
    <style>
        body {
            background-image: linear-gradient(#146aa7,#48aaadb0);
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100%;
            
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
        </div><br>
    <form method="post" action="">
        <div class="mb-3">
            <label for="GAMENAME" class="form-label">Select a game to show:</label>
            <select name="GAMENAME" id="GAMENAME" class="form-select" required>
                <option value="">Select a game</option>
                <?php foreach ($games as $game): ?>
                    <option value="<?= $game['gamename'] ?>"><?= $game['gamename'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="show_game" id="select" class="btn btn-primary">Select</button>
        </div>
    </form>
    <?php if (isset($show_game)): ?>
        <h2 class="heading">Display Game:
            <?= $show_game['gamename'] ?>
        </h2>
        <div class="tablediv"></div>
        <table>
           
            <tr>
                <td><p class="statLine"><b>ID :</b> <?= $show_game['gameid'] ?></p>
                </td>
                <td><p class="statLine"><b>Game Name : </b><?= $show_game['gamename'] ?></p>
                </td>
                <td><p class="statLine"><b>Publisher Name : </b><?= $show_game['publisher_name'] ?></p>
                </td>
    </tr>
    </table><table>
        <tr>
                <td><p class="statLine"><b>Developer Name : </b><?= $show_game['developer_name'] ?></p>
                </td>
                <td><p class="statLine"><b>Game Size : </b><?= $show_game['gamesize'] ?></p>
                </td>
                <td><p class="statLine"><b>Genre : </b><?= $show_game['genre_name'] ?></p>
                </td>
                <td><p class="statLine"><b>Price :</b> <?= $show_game['price'] ?></p>
                </td>
            </tr>
    </table><table>
            <tr>
                <td><p class="statLine"><b>Mature Content :   </b> <?= $show_game['mature_content'] ?></p>
                </td>
                <td><p class="statLine"><b>Description :  </b> <?= $show_game['description'] ?></p>
                </td>
                <td><p class="statLine"><b>Memory Required :   </b><?= $show_game['memory_required'] ?></p>
                </td>
            </tr>
            
    </table><table><tr>
                <td><p class="statLine"><b>Operating System :   </b> <?= $show_game['operating_system'] ?></p>
                </td>
                <td><p class="statLine"><b>Processor Required :    </b><?= $show_game['processor_required'] ?></p>
                </td>
                <td><p class="statLine"></p><b>Storage Required :    </b><?= $show_game['storage_required'] ?></p>
                </td>
            </tr>

        </table>
        <br>
        <br>
        <br>
    <?php endif; ?>
    </div>
</body>
<style>
    .heading,
    form {
        padding-left: 20px;
    }
    #GAMENAME{
        padding:7px;
        min-width:40% ;
    }

    #select {
        margin-top: 2px;
        background-color:rgba(30, 144, 255 ,0.4);
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
        color : whitesmoke;;
        font-style: bold;
        text-align: center;
        padding: 7px;
        max-width: 100px;
        font-size: 18px;
    }
    table {
        background-color: whitesmoke;
        color:darkslategrey;
        padding-top: 5px;
        padding-bottom: 5px;
        max-width: 90%;
        min-width:20%;
        border-style: solid ;
        border-color:  #1663be;
    }

   

    td {
        min-width:20%;
    }
    .statLine{
        font-size: 20px;

    }
    
</style>

</html><?php include 'footer.php'; ?>