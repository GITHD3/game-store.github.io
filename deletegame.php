<?php session_start(); ?>
<?php include 'navbar.php'; ?>
<link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>

<div class="text-center container py-3 pt-4">
    <h4 class="heading" style="font-family: 'Press Start 2P';font-size: 22px; color:black;"><strong>ParaCrash Game
            Store</strong></h4>
</div>
<html>
<style>
    body {
        background: linear-gradient(#404ccc, #03e9f4);
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100%;
        overflow: hidden;
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

        font-style: bold;
        text-align: center;
        padding: 7px;
        max-width: 100px;
        font-size: 18px;
    }

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
</style>

<div id="cardadmin" class="card max-w-xs mb-5 mx-auto text-center">
    <div class="list-group list-group-flush" id="links">
        <a class="linkpages block list-group-item py-2 px-4" href="admin1.php">Customer Details</a>
        <a class="linkpages block list-group-item py-2 px-4" href="admin2.php">Game Details</a>
        <a class="linkpages block list-group-item py-2 px-4" href="AdGamesAdd.php">Create Game</a>
        <a class="linkpages block list-group-item py-2 px-4" href="adGame.php">Update Game</a>
        <a class="linkpages block list-group-item py-2 px-4" href="deletegame.php">Delete Game</a>
        <a class="linkpages block list-group-item py-2 px-4" href="category.php">Category</a>
    </div>
</div>

<body>
    <?php
    $dsn = 'mysql:host=localhost;dbname=game4';
    $username = 'root';
    $password = '';

    // Create a PDO instance
    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    if (isset($pdo)) {
        $query = 'SELECT gamename FROM games';
        $stmt = $pdo->query($query);
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <form method="post" action="" style="padding-left: 17px; padding-top:10px; width:fit-content;">
            <div class="mb-3">
                <select name="GAMENAME" id="GAMENAME" class="form-select" required>
                    <option value="">Select a game to Delete </option>
                    <?php foreach ($games as $g): ?>
                        <option value="<?= $g['gamename'] ?>">
                            <?= $g['gamename'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="selectgame" id="select" class="btn btn-primary">Select</button>
            </div>
        </form>

        <?php if (isset($_POST['selectgame'])) {
            $sg = $_POST['GAMENAME'];
            $q2 = 'DELETE FROM `games` WHERE gamename = ?';
            $stmt2 = $pdo->prepare($q2);
            $stmt2->execute([$sg]);
            if ($stmt2->rowCount() > 0) {
                ?>
                <h2 style="padding-left: 16px;">Deleted:
                    <?= $sg ?>
                </h2>
            <?php } else {
                echo "<br><pre>Not Deleted";
            }
        }
    }
    ?>
</body>

</html>
<?php include 'footer.php'; ?>